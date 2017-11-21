<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1 col-sm-4 col-xs-4 text-center"><i :class="logo + ' bb-5x'"></i></div>
      <div class="col-md-11 col-sm-8 col-xs-8">
        <div class="row">
          <h4>{{teamdisplay}}</h4>
          <h5>Owner: {{user}} | Record: {{wins}} - {{losses}}</h5>
          <a :href="'https://twitch.tv/' + twitch" target="_blank"><i class="fa fa-twitch"></i></a>
        </div>
      </div>
    </div>
    <hr>
    <ul class="nav nav-tabs">
      <li role="presentation" class="team-nav" :class="currenttab == 'roster' ? 'active' : ''">
        <a @click="change_tab('roster')">Roster</a>
      </li>
      <li role="presentation" class="team-nav" :class="currenttab == 'stats' ? 'active' : ''">
        <a @click="change_tab('stats')">Stats</a>
      </li>
      <li role="presentation" class="team-nav" :class="currenttab == 'schedule' ? 'active' : ''">
        <a @click="change_tab('schedule')">Schedule and Results</a>
      </li>
    </ul>
    <span class="pull-right">Stats and Results Last Updated: {{lastupdated}}</span>
    <br>
    <template v-if="currenttab =='roster'">
      <data-tables :data="rows">
        <el-table-column
          v-for="col in rostercolumns"
          :prop="col.prop"
          :label="col.label"
          sortable="custom"
          >
        </el-table-column>
      </data-tables>
    </template>
    <template v-if="currenttab =='stats'">
      <data-tables :data="rows">
        <el-table-column
          v-for="statcol in statcolumns"
          :fit="true"
          :prop="statcol.prop"
          :label="statcol.label"
          sortable="custom"
          >
        </el-table-column>
      </data-tables>
    </template>
    <template v-if="currenttab =='schedule'">
      <div class="row">
        <div v-for="row in schedulerows" class="col-md-4 col-sm-6 col-xs-12">
          <table class="table table-bordered table-responsive table-condensed">
            <tbody>
              <tr class="active">
                <td>Team</td>
                <td>Runs</td>
                <td>Hits</td>
                <td>Errors</td>
              </tr>
              <tr>
                <td>{{cap_string(row.away)}}</td>
                <td>{{row.awayruns}}</td>
                <td>{{row.awayhits}}</td>
                <td>{{row.awayerrors}}</td>
              </tr>
              <tr>
                <td>{{cap_string(row.home)}}</td>
                <td>{{row.homeruns}}</td>
                <td>{{row.homehits}}</td>
                <td>{{row.homeerrors}}</td>
              </tr>
              <tr>
                <td v-if="row.winner == team" colspan="2" class="success text-center">Win</td>
                <td v-else colspan="2" class="danger text-center">Loss</td>
                <td colspan="2" class="text-right">Played on {{row.date}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </template>
  </div>
</template>

<script>
    import GetSheetDone from 'get-sheet-done';
    export default {
      data() {
        return {
          currenttab: 'roster',
          rows: [],
          schedulerows: [],
          lastupdated: '',
          wins: 0,
          losses: 0,
          rostercolumns: [
            {
              prop: 'name',
              label: 'Name'
            },
            {
              prop: 'pos',
              label: 'Pos.'
            },
            {
              prop: 'ovr',
              label: 'Rating'
            }
          ],
          statcolumns: [
            {
              prop: 'name',
              label: 'Name'
            },
            {
              prop: 'pos',
              label: 'Pos.'
            },
            {
              prop: 'g',
              label: 'G'
            },
            {
              prop: 'ab',
              label: 'AB'
            },
            {
              prop: 'avg',
              label: 'AVG'
            },
            {
              prop: 'hr',
              label: 'HR'
            },
            {
              prop: 'h',
              label: 'H'
            },
            {
              prop: 'rbi',
              label: 'RBI'
            },
            {
              prop: 'r',
              label: 'R'
            },
            {
              prop: 'obp',
              label: 'OBP'
            },
            {
              prop: 'babip',
              label: 'BABIP'
            },
            {
              prop: 'ops',
              label: 'OPS'
            },
            {
              prop: 'k',
              label: 'K'
            },
            {
              prop: 'bb',
              label: 'BB'
            }
          ],
          schedulecolumns: [
            {
              prop: 'team1',
              label: 'Team 1'
            },
            {
              prop: 'team1runs',
              label: 'Score'
            },
            {
              prop: 'team2',
              label: 'Team 2'
            },
            {
              prop: 'team2runs',
              label: 'Score'
            },
            {
              prop: 'winner',
              label: 'Winner'
            },
            {
              prop: 'date',
              label: 'Date'
            }
          ]
        }
      },
      methods: {
        change_tab: function(tab) {
          this.currenttab = tab;
        },
        cap_string: function(string) {
          return string.charAt(0).toUpperCase() + string.slice(1);
        }
      },
      mounted() {
        let current = window.location.pathname;
        if (current.indexOf('roster') > 0) {
          this.currenttab = 'roster';
        }
        if (current.indexOf('stats') > 0) {
          this.currenttab = 'stats';
        }
        if (current.indexOf('schedule') > 0) {
          this.currenttab = 'schedule';
        }
        GetSheetDone.labeledCols('1zTi88n9FMEvhEz3oAgTDVZBzXNzeH5-SKV_QCXy9Ze4').then(sheet => {
          let data = sheet.data;
          for(var i = 0; i < data.length; i++){
            var obj = data[i];
            for(var prop in obj){
              if(obj.hasOwnProperty(prop) && obj[prop] !== null && !isNaN(obj[prop])){
                obj[prop] = +obj[prop];
              }
            }
          }
          for (let i = 0; i < data.length; i++) {
            if (data[i].team == this.team) {
              this.lastupdated = data[i].lastupdated;
              data[i].avg = data[i].avg.toFixed(3);
              data[i].obp = data[i].obp.toFixed(3);
              data[i].babip = data[i].babip.toFixed(3);
              data[i].ops = data[i].ops.toFixed(3);
              this.rows.push(data[i]);
            }
          }
        })
        GetSheetDone.labeledCols('1FYyamjCC3FludSb_0P9kPzSeIAAzmrh1R3twk-KpWF4').then(sheet => {
          let data = sheet.data;
          for(var i = 0; i < data.length; i++){
            var obj = data[i];
            for(var prop in obj){
              if(obj.hasOwnProperty(prop) && obj[prop] !== null && !isNaN(obj[prop])){
                obj[prop] = +obj[prop];
              }
            }
          }
          for (let i = 0; i < data.length; i++) {
            if (data[i].home == this.team || data[i].away == this.team) {
              if (data[i].winner != 'TBD') {
                this.schedulerows.push(data[i]);
                if (data[i].winner == this.team) {
                  this.wins++;
                } else {
                  this.losses++;
                }
              }
            }
          }
        })
      },
      props: {
        team: {
          type: String
        },
        teamdisplay: {
          type: String
        },
        logo: {
          type: String
        },
        user: {
          type: String
        },
        twitch: {
          type: String
        }
      },
      components: {

      }
    }
</script>

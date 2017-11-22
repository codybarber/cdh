<?php

namespace App\Providers;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\SyslogUdpHandler;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{

	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{

		$url = env( 'PAPERTRAIL_URL', '' );
		if ( filter_var( $url, FILTER_VALIDATE_URL ) ) {
			$output        = "%channel%.%level_name%: %message%";
			$formatter     = new LineFormatter( $output );
			$logger        = Log::getMonolog();
			$syslogHandler = new SyslogUdpHandler( "logs6.papertrailapp.com", env( 'PAPERTRAIL_PORT' ) );
			$syslogHandler->setFormatter( $formatter );
			$logger->pushHandler( $syslogHandler );

		}

	}

}

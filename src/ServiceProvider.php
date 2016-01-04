<?php

namespace Claremontdesign\Jsplugins;

/**
 * Dx
 *
 * @link http://dennesabing.com
 * @author Dennes B Abing <dennes.b.abing@gmail.com>
 * @license proprietary
 * @copyright Copyright (c) 2015 ClaremontDesign/MadLabs-Dx
 * @version 0.0.0.1
 * @since Nov 27, 2015 1:43:45 PM
 * @file routes.php
 * @project Claremontdesign
 * @package Jsplugins
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

	public function register()
	{
		// Register this service
		$this->app->singleton('jsplugins', function($app){
			return new Jsplugins;
		});
		app('cdbase')->addPackage(\Claremontdesign\Jsplugins\Jsplugins::class);
	}

	public function boot()
	{
		// Define the path for the view files
		$this->loadViewsFrom(__DIR__ . '/../resources/views', cd_jsplugins_tag());

		$this->publishes([
			__DIR__ . '/../resources/assets' => public_path('assets/jsplugins'),
				], 'public');

		$this->publishes([
			__DIR__ . '/../resources/views' => base_path('resources/views/claremontdesign/jsplugins'),
				], 'views');

		// Loading the routes file
		require __DIR__ . '/Http/routes.php';
	}

}

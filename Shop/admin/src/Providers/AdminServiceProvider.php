<?php

namespace Shop\Admin\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Shop\Setting\Services\SettingService;

class AdminServiceProvider extends ServiceProvider
{
	public function register(): void {}

	public function boot(): void
	{
		View::composer('*', function ($view) {
			$data = SettingService::getSetting();
			$view->with($data);
		});
	}
}

<?php

namespace Shop\Store\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Shop\Catelog\Models\Category;

class StoreServiceProvider extends ServiceProvider
{
	public function register(): void
	{
	}
	
	public function boot(): void
	{
		View::composer('store::*', function($view) {
			$cartCount = Auth::check() ? Auth::user()->carts()->count() : 0;
			$wishlistCount = Auth::check() ? Auth::user()->wishlists()->count() : 0;
        	$categories = Category::where('status', 1)->orderBy('order_id', 'asc')->with('children')->get();
			$view->with([
				'categories' => $categories,
				'wishlistCount', $wishlistCount,
				'cartCount', $cartCount,
			]);
		});
	}
}

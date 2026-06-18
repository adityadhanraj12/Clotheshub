<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            $cartItems = Cart::with('product')
                ->where(function ($query) {
                    $query->where('user_id', auth()->id())
                        ->orWhere('session_id', session()->getId());
                })
                ->get();

            $cartCount = $cartItems->sum('quantity');

            $cartTotal = $cartItems->sum(function ($cart) {
                return $cart->quantity * $cart->product->base_price;
            });

            $view->with(compact(
                'cartItems',
                'cartCount',
                'cartTotal'
            ));
        });
    }
}

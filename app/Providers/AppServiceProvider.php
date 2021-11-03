<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {

            $jumlah = 0;

            if (Auth::user()) {
                $order= Order::where('user_id', Auth::user()->id)->where('status',0)->first();

                if($order){
                $jumlah = (OrderDetail::where('order_id', $order->id))->count();
                }
            }
            $view->with('jumlah', $jumlah);
        });
    }
}

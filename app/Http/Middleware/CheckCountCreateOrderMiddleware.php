<?php

namespace App\Http\Middleware;

use App\Order;
use Carbon\Carbon;
use Closure;

class CheckCountCreateOrderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Order::where('user_id',auth()->user()->id)->where('created_at','>=',Carbon::today())->count() < 1) {
            return $next($request);
        }
        return redirect('/')->with('status','Вы не можете отправлять больше одного заказа в день!');
    }
}

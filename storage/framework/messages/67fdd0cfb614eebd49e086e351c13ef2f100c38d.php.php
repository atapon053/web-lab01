<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Xinax\LaravelGettext\Facades\LaravelGettext;

class Language
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws \Exception
     * @throws \Xinax\LaravelGettext\Exceptions\LocaleNotSupportedException
     */
    public function handle($request, Closure $next)
    {
//        LaravelGettext::setLocale(Session::get('locale'));
//        LaravelGettext::getLocale();
        app()->setLocale(Session::get('locale'));
        return $next($request);
    }
}

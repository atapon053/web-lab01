<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Xinax\LaravelGettext\Facades\LaravelGettext;

class Language
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $default_lang = getLangs()->where('default', true)->first();
        switch ($default_lang) {
            case ! is_null($request->locale):
                Cookie::queue('locale', $request->locale, 3000);
//                app()->setLocale(Crypt::decrypt(Cookie::get('locale')));
                LaravelGettext::setLocale(Crypt::decrypt(Cookie::get('locale')));
                break;

            case ! is_null(Cookie::get('locale')):
//                app()->setLocale(Crypt::decrypt(Cookie::get('locale')));
                LaravelGettext::setLocale(Crypt::decrypt(Cookie::get('locale')));
                break;

            default:
                Cookie::queue('locale', $default_lang->abbr, 3000);
        }
//        app()->getLocale();
//        LaravelGettext::setLocale(Session::get('locale'));
        LaravelGettext::getLocale();
        return $next($request);
    }
}

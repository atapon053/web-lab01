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
        if (! is_null($request->locale)) {
            Cookie::queue('locale', $request->locale, 3000);
        }

        $selected_lang = $request->locale ?: Cookie::get('locale') ?: null;
        if ($selected_lang) {
            LaravelGettext::setLocale(Crypt::decrypt(Cookie::get('locale')));
        } else {
            $default_lang = getLangs()->where('default', true)->first();
            if ($default_lang){
                Cookie::queue('locale', $default_lang->abbr, 3000);
            }
        }

//        app()->getLocale();
//        LaravelGettext::setLocale(Session::get('locale'));
        LaravelGettext::getLocale();
        return $next($request);
    }
}

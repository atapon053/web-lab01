<?php

if (! function_exists('getLangs'))
{
    function getLangs()
    {
        $langs = \Backpack\LangFileManager\app\Models\Language::query()
            ->where('active',  true);

        return $langs;
    }
}

if (! function_exists('setLang'))
{
    function setLang()
    {
        if (request()->get('locale')) {
            \Illuminate\Support\Facades\Session::put('locale' , request()->get('locale'));
        } else {
            \Illuminate\Support\Facades\Session::put('locale' , app()->getLocale());
        }
        app()->setLocale(\Illuminate\Support\Facades\Session::get('locale'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\TestRelation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Google\Cloud\Translate\TranslateClient;
use Xinax\LaravelGettext\Facades\LaravelGettext;

class TestRelationController extends Controller
{

    public function index(Request $request)
    {
        $translate = $this->translate($request);
        $get_lang = Session::get('locale');

        $users = User::query()->get();
        $test_models = TestRelation::query()->with('user')->get();

        return view('welcome', compact('users', 'test_models', 'get_lang'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $test_relation = TestRelation::create($request->all());
        $user = \Redis::set('user:profile:'.$test_relation->id, $test_relation->name);
        return redirect()->route('home');
    }

    public function translate($request)
    {
        // $lang is 'en' or 'th'
        Session::put('locale' ,$request->local);
        LaravelGettext::setLocale(Session::get('locale'));
        dump(LaravelGettext::getLocale());

//        echo __('home.home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        // 用意した言語配列(config/languages.php)に引数で渡した$langがあるっとき、セッションのapplocaleに$langを保存する。
        if (array_key_exists($lang, Config::get("languages"))) {
            Session::put("applocale", $lang);
        }
        return Redirect::back();
    }
}

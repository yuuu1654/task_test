<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Test;

use Illuminate\Support\Facades\DB;


class TestController extends Controller
{
    //
    public function index(){
        $values = Test::all();

        $tests = DB::table('tests')->get();

        //処理を止めて変数の中身を表示する
        dd($tests);

        //compact関数でコントローラーからビューファイルに変数を渡す
        return view("tests.test", compact("values"));
    }
}

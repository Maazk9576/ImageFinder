<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class User extends Controller
{
    public function index(){
        $res=1;
        return view('pexels',compact('res'));

    }

    public function index_submit(Request $request)
    {

        $q=$request->input('sea');


  $re=Http::withToken(env('PEXEL_API_KEY'))->get("https://api.pexels.com/v1/search?query="."$q"."&per_page=15&page=1")->json();

$res=collect($re["photos"]);

if ($res=="") {
    $res=1;
    return view('pexels',compact('res'));
} else {
 return view('pexels',compact('res'));

}

    }
}

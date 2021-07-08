<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class languagesController extends Controller
{
    

    public function lang_change(Request $request)
    {
        App::setLocale($request->lang);
        
        session()->put('locale', $request->lang);  

        return view('formulaire2')->with('msg','message');
    }
}

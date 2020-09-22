<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {

        return view('/home');
    }

    public function upload(Request $request){
        if($request->hasFile('avatar'))
        {
            User::uploadAvatar($request->avatar);
            return redirect()->back()->with('message','Image Uploaded');//success
        }
        return redirect()->back()->with('error','Image Uploaded Fail');//error
    }

}

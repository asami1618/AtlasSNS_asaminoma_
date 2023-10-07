<?php

namespace App\Http\Controllers;

use App\User;
use App\follows;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
}

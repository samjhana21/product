<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   function index(){

    return view('dashboard.user.index');
   }

   function profile(){
       return view('dashboard.user.profile');
   }
   function aroundme(){
       return view('dashboard.user.aroundme');
   }
   function iamgoingto(){
    return view('dashboard.user.iamgoingto');
   }
   function helpandfeedbacks(){
    return view('dashboard.user.helpandfeedbacks');
   }
}

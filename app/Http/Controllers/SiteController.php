<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {
        return view('logs');
    }

    // public function logs() {


        // if(auth()->check()){
        //     $logs = auth()->user()->logs;
        //     return view('logs', compact('logs'));
        // }else{
        //     return redirect('/logs');
        // }
        public function logs() {
            $logs = Log::orderby('id', 'desc')->get();
            return view('logs', compact('logs'));
    }
}
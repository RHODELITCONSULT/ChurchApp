<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//* Models

//* Utilities
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    //Todo => Client home page
    public function index(){
        try{
            return view("Frontend.Pages.home");
        }catch(\Exception $e){
            Log::error("Error: ".$e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

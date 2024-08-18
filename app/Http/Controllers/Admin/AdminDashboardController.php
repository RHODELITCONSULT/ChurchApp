<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//* Utilities
use Illuminate\Support\Facades\Log;

class AdminDashboardController extends Controller
{
    //Todo => Admin Dashboard
    public function index(){
        try{
            return view("Backend.pages.dashboard");
        }catch(\Exception $e){
            Log::error("Error: ".$e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

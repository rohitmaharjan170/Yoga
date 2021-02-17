<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function index(){
        
        $q = Input::get ( 'q' );
        $package = Package::where ( 'name', 'LIKE','%'. $q . '%' )->get();
        
        if($q != ""){
            if (count ( $package ) > 0){
                return view ( 'frontend/pages/search' )->withDetails ( $package )->withQuery ( $q );
            }
            else
            return view ( 'frontend/pages/search' )->withMessage ( 'No Details found. Try to search again !' );
        }
        return view ( 'frontend/pages/search' )->withMessage ( 'No Details found. Try to search again !' );
    }
}

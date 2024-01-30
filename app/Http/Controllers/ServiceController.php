<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {

        return view('service' );
    }

    public function create(){
        return view('create');
    }

    public function show($id)
    {
        return view('show',[]);
    }


    public function update(){

        return view('update');
    }


    public function destroy(){

    }
}

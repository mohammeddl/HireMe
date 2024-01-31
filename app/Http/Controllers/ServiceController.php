<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\categorie;

class ServiceController extends Controller
{
    public function index()
    {
        $servicsFromDB = Service::all();

        return view('service',['service'=>$servicsFromDB]);
    }

    public function create()
    {
        $modifyServicsFromDB= categorie::all();

        return view('create',['post'=>$modifyServicsFromDB]);
    }

    public function show($id)
    {
        $singelServicsFromDB = Service::findOrFail($id);

        return view('show', ['post'=>$singelServicsFromDB]);
    }


    public function update($id)
    {
        $modifyServicsFromDB= Service::findOrFail($id);

        return view('modify',['post'=>$modifyServicsFromDB]);
    }


    public function delete()
    {
        return 'is destroy';
    }


    public function store(){

        $img = request()->img;
        $title = request()->title;
        $description = request()->description;
        $date = request()->date;
        $category = request()->category;


        $service = new Service;
        $service->img = $img;
        $service->title = $title;
        $service->description = $description;
        $service->updated_at = $date;
        $service->date = $date;
        $service->category_id = $category;
        $service->save();

        return to_route('service.index');
    }
}

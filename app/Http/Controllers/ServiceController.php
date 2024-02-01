<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\categorie;

class ServiceController extends Controller
{


    public function home()
    {
        $servicsFromDB = Service::latest('date')->limit(3)->get();
        return view('welcome',['lastServices'=>$servicsFromDB]);
    }


    public function index()
    {
        $servicsFromDB = Service::all();

        return view('service', ['service' => $servicsFromDB]);
    }

    public function create()
    {
        $modifyServicsFromDB = categorie::all();

        return view('create', ['post' => $modifyServicsFromDB]);
    }

    public function show($id)
    {
        $singelServicsFromDB = Service::findOrFail($id);

        return view('show', ['post' => $singelServicsFromDB]);
    }


    public function update($id)
    {
        $modifyCategoryFromDB = categorie::all();
        $modifyServicsFromDB = Service::findOrFail($id);

        return  view('modify', ['post' => $modifyServicsFromDB, 'categories' => $modifyCategoryFromDB]);
    }


    public function modify($id)
    {

        $img = request()->img;
        $title = request()->title;
        $description = request()->description;
        $category = request()->category;

        $modifyServicsFromDB = Service::findOrFail($id);
        $modifyServicsFromDB->update([
            'img' => $img,
            'title' => $title,
            'description' => $description,
            'category_id' => $category
        ]);

        return to_route('service.show', $id);
    }

    public function delete($id)
    {
        $ServicsFromDB = Service::findOrFail($id);
        $ServicsFromDB->delete();
        return to_route('service.index');
    }


    public function store()
    {

        $img = request()->img;
        $title = request()->title;
        $description = request()->description;
        $date = request()->date;
        $category = request()->category;


        $service = new Service;
        $service->img = $img;
        $service->title = $title;
        $service->description = $description;
        $service->date = $date;
        $service->category_id = $category;
        $service->save();

        return to_route('service.index');
    }
}

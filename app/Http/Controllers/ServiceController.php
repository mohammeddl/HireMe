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
        return view('welcome', ['lastServices' => $servicsFromDB]);
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

        return to_route('service.show', $id)->with('success','your service is updated');
    }

    public function delete($id)
    {
        $ServicsFromDB = Service::findOrFail($id);
        $ServicsFromDB->delete();
        return to_route('service.index')->with('success','your service is destroy');
    }


    public function store(Request $request)
    {

        $request->validate([
            'img' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'category' => 'required',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); 
        } else {
            $imageName = null;
        }

        $service = new Service;
        $service->img =  $imageName;
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->date = $request->input('date');
        $service->category_id = $request->input('category');
        $service->save();

        return to_route('service.index')->with('success','your service is created');
    }
}

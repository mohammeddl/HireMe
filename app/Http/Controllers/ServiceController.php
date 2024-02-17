<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\categorie;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{


    public function home()
    {
        $servicsFromDB = Service::latest('date')->limit(3)->get();
        return view('welcome', ['lastServices' => $servicsFromDB]);
    }


    public function index()
    {
        $userId = Auth::id();
        $servicesFromDB = Service::where('user_id', $userId)->get();

        return view('service', ['service' => $servicesFromDB]);
    }

    public function create()
    {
        $categoryFromDB = categorie::all();

        return view('create', ['post' => $categoryFromDB]);
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

        request()->validate([
            'img' => 'image',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => [
                'required',
            ],
        ]);

        if (request()->hasFile('img')) {
            $image = request()->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'service.png';
        }


        $title = request()->title;
        $description = request()->description;
        $category = request()->category;

        $modifyServiceFromDB = Service::findOrFail($id);
        $modifyServiceFromDB->update([
            'img' => request()->hasFile('image') ? $imageName : $modifyServiceFromDB->image,
            'title' => $title,
            'description' => $description,
            'category_id' => $category,
        ]);
        return redirect()->route('service.show', $id)->with('success', 'Your service is updated');
    }

    public function delete($id)
    {
        $serviceFromDB = Service::findOrFail($id);
        $serviceFromDB->delete();
        return redirect()->route('service.index')->with('success', 'Your service has been deleted successfully.');
    }


    public function store(Request $request)
    {

        $request->validate([
            'img' => 'required',
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'service.png';
        }

        $userId = Auth::id();
        $service = new Service;
        $service->img =  $imageName;
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->date = $request->input('date');
        $service->category_id = $request->input('category');
        $service->price = $request->input('price');
        $service->user_id = $userId;
        $service->save();

        return to_route('service.index')->with('success', 'your service is created');
    }
}

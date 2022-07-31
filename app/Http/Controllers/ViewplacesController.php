<?php

namespace App\Http\Controllers;

use App\Models\Viewplaces;
use App\Http\Requests\StoreViewplacesRequest;
use App\Http\Requests\UpdateViewplacesRequest;
use Illuminate\Support\Facades\File;
class ViewplacesController extends Controller
{
    public function index()
    {
        $viewplaces = viewplaces::all();
      return view ('viewplaces.index')->with('viewplaces', $viewplaces);
    }

   
    public function create()
    {
        
        return view('viewplaces.create');
    }

   
    public function store(StoreviewplacesRequest $request)
    {
        $viewplaces = new viewplaces;
        $viewplaces->placename=$request-> input('placename');
        $viewplaces->description=$request-> input('description');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/viewplaces/', $filename);
            $viewplaces->image = $filename;
        }
        $viewplaces->save();
        return redirect('viewplaces')->with('flash_message', 'viewplace Addedd!');  
    }

   
    public function show($id)
    {
        $viewplaces = viewplaces::find($id);
        return view('viewplaces.show')->with('viewplaces', $viewplaces);
    }

   
    public function edit($id)
    {
        $viewplaces = viewplaces::find($id);
        return view('viewplaces.edit')->with('viewplaces', $viewplaces);
    }

   
    public function update(UpdateviewplacesRequest $request, $id)
    {
        $viewplaces = viewplaces::find($id);
        $input = $request->all();
        $viewplaces->update($input);

        if($request->hasfile('image'))
        {
            $destination = 'uploads/viewplaces/'.$viewplaces->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/viewplaces/', $filename);
            $viewplaces->image = $filename;
        }

        $viewplaces->update();
        return redirect('viewplaces')->with('flash_message', 'viewplace Updated!');  
    }

   
    public function destroy($id)
    {
        $viewplaces = viewplaces::find($id);
        $destination = 'uploads/viewplaces/'.$viewplaces->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $viewplaces->delete();

        return redirect('viewplaces')->with('flash_message', 'viewplace deleted!'); 
    }
}


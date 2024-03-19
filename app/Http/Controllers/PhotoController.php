<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.Photos.Data', [
            'photos' => Photo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Photos.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|file|image|max:2048',
            'judulFoto' => 'required',
            'deskripsiFoto' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images');
        }

        Photo::create($validatedData);

        return redirect('dashboard/photos')->with('created', 'Gallery Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        return view('Dashboard.Photos.Edit', [
            'photo' => $photo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        $rules = [
            'image' => 'file|image|max:2048',
            'judulFoto' => 'required',
            'deskripsiFoto' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('images');
        };

        Photo::where('id', $photo->id)->update($validatedData);

        return redirect('dashboard/photos')->with('updated', 'Gallery Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        if ($photo->image) {
            Storage::delete($photo->image);
        }

        Photo::destroy($photo->id);

        return redirect('dashboard/photos')->with('deleted', 'Gallery Deleted!');
    }
}
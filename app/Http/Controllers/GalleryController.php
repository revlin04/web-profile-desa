<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\about;
use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class galleryController extends Controller
{
    /**
     * Display a listing of the resource (Frontend).
     */
    public function index_fr()
    {
        $home = Home::all();
        $about = about::all();
        $gallery = gallery::paginate(9); // Paginate 9 items per page (Frontend)

        return view('frontend.gallery', [
            'gallery' => $gallery,
            'about' => $about,
            'home' => $home,
        ]);
    }

    /**
     * Display a listing of the resource (Dashboard).
     */
    public function index()
    {
        $gallery = gallery::paginate(5); // Paginate 10 items per page (Admin)

        return view('dashboard.gallery', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.gallery-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->only('name', 'title');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = $profileImage;
        }

        gallery::create($input);

        return redirect('/dashboard/gallery')->with('success', 'Gallery item created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gallery = gallery::findOrFail($id);

        return view('dashboard.gallery-edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gallery = gallery::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->only('name', 'title');

        if ($request->hasFile('image')) {
            // Hapus file lama
            if ($gallery->image && file_exists(public_path('image/' . $gallery->image))) {
                unlink(public_path('image/' . $gallery->image));
            }

            $image = $request->file('image');
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = $profileImage;
        }

        $gallery->update($input);

        return redirect('/dashboard/gallery')->with('success', 'Gallery item updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = gallery::findOrFail($id);

        // Hapus gambar di folder jika ada
        if ($gallery->image && file_exists(public_path('image/' . $gallery->image))) {
            unlink(public_path('image/' . $gallery->image));
        }

        $gallery->delete();

        return redirect('/dashboard/gallery')->with('success', 'gallery item deleted successfully.');
    }
}

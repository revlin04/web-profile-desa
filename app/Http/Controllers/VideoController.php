<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\about;
use App\Models\video;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorevideoRequest;
use App\Http\Requests\UpdatevideoRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = video::latest()->paginate(5);
        // mengirim data blog ke view 
        return view('dashboard.video', ['gallery' => $gallery]);
    }
    public function index_fr()
    { {
            $home = Home::all();
            $about = about::all();
            $gallery = DB::table('videos')->get();
            // mengirim data blog ke view 
            return view('frontend.video', [
                'gallery' => $gallery,
                'about' => $about,
                'home' => $home
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.video-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorevideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevideoRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm:',
            'link' => 'required',
        ]);

        $input = $request->all();

        if ($video = $request->file('video')) {
            $destinationPath = 'video/';
            $profileImage = date('YmdHis') . "." . $video->getClientOriginalExtension();
            $video->move($destinationPath, $profileImage);
            $input['video'] = "$profileImage";
        }

        Video::create($input);

        return redirect('/dashboard/videos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(video $video, $id)
    {
        $gallery = DB::table('videos')->where('id', $id)->first();
        return view('dashboard.video-edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevideoRequest  $request
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatevideoRequest $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'link' => 'required',
            'video' => 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm',
        ]);

        $gallery = Video::findOrFail($id); // HARUS ambil data by id

        $input = $request->all();

        if ($video = $request->file('video')) {
            $destinationPath = 'video/';
            $profileVideo = date('YmdHis') . "." . $video->getClientOriginalExtension();
            $video->move($destinationPath, $profileVideo);
            $input['video'] = "$profileVideo";
        } else {
            unset($input['video']);
        }

        $gallery->update($input);

        return redirect('/dashboard/videos')->with('success', 'Video updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(video $video, $id)
    {
        DB::table('videos')->where('id', $id)->delete();
        return redirect('/dashboard/videos');
    }
}

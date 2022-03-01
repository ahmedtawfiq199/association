<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoAlbumRequest;
use App\Models\ControlPanel\PhotoAlbum as ControlPanelPhotoAlbum;
use App\Models\PhotoAlbum;
use App\Models\PhotoAlbumImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = PhotoAlbum::get();

        return view('control-panel.multiMedia.photoAlbum.index',[
            'albums' => $albums,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control-panel.multiMedia.photoAlbum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoAlbumRequest $request)
    {
        $data = $request->validated();


        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $image = $request->file('image')->store('photoAlbum','public');
        }

        $data['image'] = $image;

        $album = PhotoAlbum::create($data);


        return redirect()->route('photo-album.index')->with('success','Album Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoAlbum $photo_album)
    {
        return view('control-panel.multiMedia.photoAlbum.show',[
            'album' => $photo_album,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoAlbum $photo_album)
    {
        return view('control-panel.multiMedia.photoAlbum.edit',[
            'album' => $photo_album,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoAlbumRequest $request, PhotoAlbum $photo_album)
    {
        $data = $request->validated();

        $image = $photo_album->image;

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('photoAlbum','public');
            $data['image'] = $image;
        }

        $photo_album->update($data);

        return redirect()->route('photo-album.index')->with('success','Album Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoAlbum $photo_album)
    {
        //
        foreach($photo_album->photoAlbumImages as $gallery)
        {
            Storage::disk('public')->delete($gallery->image);
            $gallery->delete();
        }

        Storage::disk('public')->delete($photo_album->image);
        $photo_album->delete();
        return redirect()->route('photo-album.index')->with('success','Album Deleted Successfully');

    }

    public function updatePhotos(Request $request, PhotoAlbum $photo_album)
    {
        $data = $request->validate([
            'gallery' => 'array|nullable',
        ]);


        foreach($photo_album->photoAlbumImages as $gallery)
        {
            if($request->has("check_".$gallery->id) == 1)
            {
                Storage::disk('public')->delete($gallery->image);
                $gallery->delete();
            }
        }

        if($request->hasFile('gallery'))
        {
            foreach($request->file('gallery') as $file)
            {
                $image = $file->store('photoAlbum','public');
                $photo_album->photoAlbumImages()->create([
                    'image' => $image,
                ]);
            }
        }

        return redirect()->route('photo-album.show',$photo_album->id)->with('success','Album Updated Successfully');

    }
}

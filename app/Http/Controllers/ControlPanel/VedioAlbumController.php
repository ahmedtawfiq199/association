<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\VedioAlbumRequest;
use App\Models\VedioAlbum;
use Illuminate\Http\Request;

class VedioAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = VedioAlbum::get();

        return view('control-panel.multiMedia.vedioAlbum.index',[
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
        return view('control-panel.multiMedia.vedioAlbum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VedioAlbumRequest $request)
    {
        $album = VedioAlbum::create($request->validated());

        return redirect()->route('vedio-album.index')->with('success','Album '. $album->name .'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VedioAlbum $vedio_album)
    {
        return view('control-panel.multiMedia.vedioAlbum.edit',[
            'album' => $vedio_album,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VedioAlbumRequest $request, VedioAlbum $vedio_album)
    {
        $vedio_album->update($request->validated());

        return redirect()->route('vedio-album.index')->with('success','Album '.$vedio_album->name.' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VedioAlbum $vedio_album)
    {
        //
        $vedio_album->delete();
        return redirect()->route('vedio-album.index')->with('success','Album Deleted Successfully');

    }
}

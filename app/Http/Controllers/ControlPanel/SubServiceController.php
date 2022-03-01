<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubServiceRequest;
use App\Models\SubService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_services = SubService::paginate();

        return view('control-panel.services.subservices.index',[
            'sub_services' => $sub_services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control-panel.services.subservices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubServiceRequest $request)
    {
        $data = $request->validated();

        $image = null;

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $image = $request->file('image')->store('subservices','public');
        }

        $data['image'] = $image;

        $service = SubService::create($data);

        return redirect()->route('subservices.index')->with('success','Sub Service '. $service->name .' Created Done!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_service = SubService::findOrFail($id);
        return view('control-panel.services.subservices.edit',[
            'sub_service' => $sub_service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubServiceRequest $request, $id)
    {
        $sub_service = SubService::findOrFail($id);

        $data = $request->validated();

        $image = $sub_service->image;

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('subservices','public');
        }

        $data['image'] = $image;

        $sub_service->update($data);

        return redirect()->route('subservices.index')->with('success','Sub Service Updated Done!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_service = SubService::findOrFail($id);
        $sub_service->delete();
        Storage::disk('public')->delete($sub_service->image);
        return redirect()->route('subservices.index')->with('success','Service Deleted Done!');
    }
}

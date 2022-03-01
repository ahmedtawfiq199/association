<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $services = Service::paginate();

        return view('control-panel.services.index',[
            'services' => $services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('control-panel.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\View\View
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();

        $image = null;

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $image = $request->file('image')->store('services','public');
        }

        $data['image'] = $image;

        $service = Service::create($data);

        return redirect()->route('services.index')->with('success','Service '. $service->name .' Created Done!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Service  $service
     * @return \Illuminate\View\View
     */
    public function edit(Service $service)
    {
        return view('control-panel.services.edit',[
            'service' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreServiceRequest  $request
     * @param  App\Models\Service  $service
     *
     * @return \Illuminate\View\View
     */
    public function update(StoreServiceRequest $request, Service $service)
    {
        $data = $request->validated();

        $image = $service->image;

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('services','public');
        }

        $data['image'] = $image;

        $service->update($data);

        return redirect()->route('services.index')->with('success','Service Updated Done!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Service  $service
     * @return \Illuminate\View\View
     */
    public function destroy(Service $service)
    {
        $service->delete();
        Storage::disk('public')->delete($service->image);
        return redirect()->route('services.index')->with('success','Service Deleted Done!');
    }
}

<?php

namespace App\Http\Controllers\ControlPanel;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $clients = Client::paginate();

        return view('control-panel.clients.index',[
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('control-panel.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\View\View
     */
    public function store(StoreClientRequest $request)
    {
        $data = $request->validated();

        $image = null;

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $image = $request->file('image')->store('clients','public');
        }

        $data['image'] = $image;

        $client = Client::create($data);

        return redirect()->route('clients.index')->with('success','Client '.$client->name.' Created Done!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Client  $client
     * @return \Illuminate\View\View
     */
    public function edit(Client $client)
    {
        return view('control-panel.clients.edit',[
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreClientRequest  $request
     * @param  App\Models\Client  $client
     *
     * @return \Illuminate\View\View
     */
    public function update(StoreClientRequest $request, Client $client)
    {
        $data = $request->validated();

        $image = $client->image;

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('clients','public');
            $data['image'] = $image;
        }



        $client->update($data);

        return redirect()->route('clients.index')->with('success','Client Updated Done!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Client  $client
     * @return \Illuminate\View\View
     */
    public function destroy(Client $client)
    {
        $client->delete();
        Storage::disk('public')->delete($client->image);
        return redirect()->route('clients.index')->with('success','Client Deleted Done!');
    }
}

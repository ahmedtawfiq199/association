<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{

    public function index()
    {
        $subMenus = SubMenu::all();
        return view('control-panel.sub-menus.index',['subMenus'=>$subMenus]);
    }


    public function create()
    {
        return view('control-panel.sub-menus.create');
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required'
        ]);
//        dd();
        SubMenu::create($request->all());
        return redirect()->route('sub-menus.index')->with('success','Menu Updated Successfully!');

    }


    public function show($id)
    {
        //
    }


    public function edit(SubMenu $sub)
    {
        return view('control-panel.sub-menus.edit',compact('sub'));
    }


    public function update(Request $request, SubMenu $sub)
    {
        $validate = $request->validate([
            'name'=>'required'
        ]);
        dd($request->all());
        $sub->update($request->all());
        return redirect()->route('sub-menus.index')->with('success','Menu Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        return redirect()->route('sub-menus.index')->with('success','Menu Updated Successfully!');

        //
    }
}

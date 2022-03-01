<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Websit;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::all();
        return view('control-panel.menus.index',compact('menus'));
    }


    public function create()
    {
        $subMenus = SubMenu::all();
        return view('control-panel.menus.create',compact('subMenus'));
    }


    public function store(Request $request)
    {
        $data = validator($request->all(), [
            'name' => 'required',
            'link' => 'required'
        ]);
        if (!$data->fails()) {
            $menu = new Menu();
            $menu->name = $request->name;
            $menu->link = Websit::first()->url.'/'.$request->link;
            $menu->save();
            return redirect()->route('menus.index');
        } else{
            return dd('Error Validation');
    }

    }


    public function show($id)
    {
        //
    }


    public function edit(Menu $menu)
    {
        $subMenus = SubMenu::all();
        if (Websit::first()->url != null){
            Websit::first()->url = null;
        }else{
            dd('Not Have');
        }
        return view('control-panel.menus.edit',['menu'=>$menu,'subMenus'=>$subMenus]);
    }

    public function update(MenuRequest $request, Menu $menu)
    {
        $data = $request->validated();
//        dd(Websit::first()->url.'/'.$request->link);
        $data['link'] = Websit::first()->url.'/'.$request->link;
        $menu->update($data);
        return redirect()->route('menus.index')->with('success','Menu Updated Successfully!');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with('success','Menu Deleted Successfully');
        //
    }
}

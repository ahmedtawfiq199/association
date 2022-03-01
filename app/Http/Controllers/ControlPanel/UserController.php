<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * function for view all user
     *
     * @return \Illuminate\View\View
     */
    public function index(){
        $users = User::all();

        return view('control-panel.users.index',[
            'users' => $users,
        ]);
    }

    /**
     * function for view create page
     *
     * @return \Illuminate\View\View
     */
    public function create(){
        return view('control-panel.users.create');
    }

    /**
     * function for view create page
     *
     * @param App\Http\Requests\StoreUserRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_name' =>  $request->user_name,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            'role' => $request->role,
        ]);

        event(new Registered($user));


        return redirect()->route('all-users')->with('success','User '. $user->name .' Created!');
    }


    /**
     * function for view ebit user page
     *
     * @param App\Models\User $user
     *
     * @return \Illuminate\View\View
     */
    public function edit(User $user){
        return view('control-panel.users.edit',[
            'user' => $user,
        ]);
    }


    /**
     * function for update user in database
     *
     * @param App\Models\User $user
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function update(Request $request,User $user){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable','min:8','string'],
            'phone' => ['numeric', 'min:10', 'nullable', "unique:users,phone,".$user->id],
            'address' => ['string', 'nullable'],
        ]);

        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        if($request->has('password'))
        {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('all-users')->with('success','User '. $user->name .' Updated!');
    }


     /**
     * function for delete user from database
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function destroy(Request $request){
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->route('all-users')->with('success','User deleted!');
    }


}

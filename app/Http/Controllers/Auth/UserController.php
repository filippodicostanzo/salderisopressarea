<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('auth.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->sortBy('name');
        return view('auth.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        //$role= Role::where('name', 'LIKE', $request['role'])->first();

        $res = $user->save();

        $user->attachRole($request['role']);

        //$user->roles()->attach([$admin->id]);

        //$user->attachRole($request['role']);

        $message = $res ? 'L\'Utente ' . $user->name . ' è stato inserito' : 'L\'Utente ' . $user->name . ' non è stato inserito';
        session()->flash('message', $message);
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('auth.users.show', ['item' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $item = $user;
        $roles = Role::all()->sortBy('name');
        $selectedRole= $item->roles[0]->name;
        return view('auth.users.edit', compact('item', 'roles','selectedRole'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return void
     */
    public function update(Request $request, User $user)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);



        $input = $request->all();
        $input['password'] = Hash::make($request->input('password'));

        $selectedRole= $user->roles[0]->name;

        if ($input['role']!=$selectedRole) {
            $user->detachRole($selectedRole);
            $user->attachRole($input['role']);
        }


        $res = User::find($user->id)->update($input);

        $message = $res ? 'L\'Utente ' . $user->name . ' è stato modificato' : 'L\'Utente ' .  $user->name . ' non è stato modificato';
        session()->flash('message', $message);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $res = $user->delete();
        $message = $res ? 'L\'Utente ' . $user->name . ' è stato cancellato' : 'L\'Utente ' . $user->name. ' non è stato cancellato';
        session()->flash('message', $message);
        return redirect()->route('users.index');
    }

}



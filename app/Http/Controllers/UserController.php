<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select * from user
        $users = User::orderBy('id', 'desc')->get();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::get();
        return view('user.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->password != $request->konfirmasi) {
            return redirect()->to('user/create')->with('error', 'Kondirmasi Password salah blokk');
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'id_level' => $request->id_level,
            'password' => Hash::make($request->password)
        ]);
        // alert('Title','Lorem Lorem Lorem', 'success');
        toast('User berhasil di simpan!', 'success');
        return redirect()->to('user')->with('message', 'Data berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $edit = User::find($id);
        $edit = User::findOrFail($id);
        $levels = Level::get();
        return view('user.edit', compact('edit', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'id_level' => $request->id_level,
            'password' => Hash::make($request->password ? Hash::make($request->password) : $user->password)
        ]);
        return redirect()->to('user')->with('message', 'Data berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->to('user')->with('message', 'Data berhasil di hapus!');
    }
}

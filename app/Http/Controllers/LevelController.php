<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::get();
        // whereNull('deleted_at')->orderBy('id', 'desc')->
        $title = 'Delete Level!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('level.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Level::create([
            'level_name' => $request->level_name,
        ]);
        Alert::success('Success', 'Data berhasil di simpan!');
        return redirect()->to('level')->with('message', 'Data berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string  $id)
    {
        $edit = level::findOrFail($id);
        return view('level.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $level = Level::find($id);
        Level::where('id', $id)->update([
            'level_name' => $request->level_name,
        ]);
        Alert::success('Success', 'Data berhasil di ubah!');
        return redirect()->to('level')->with('message', 'Data berhasil di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $levels = Level::findOrFail($level);
        // $levels->deleted_at = now(); // Set the deleted_at timestamp to the current time
        $levels->save(); // Save the changes
        return redirect()->to('level')->with('message', 'Data berhasil di hapus!');
    }
}

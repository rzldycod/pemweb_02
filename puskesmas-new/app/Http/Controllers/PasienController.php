<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kelurahan;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index(){
            $list_pasien = Pasien::all();
            return view('admin.pasien.index',compact('list_pasien'));
        }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasiens = Kelurahan::all();
        return view('admin.pasien.create', compact('pasiens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // validasi form input
                $validated = $request->validate([
                    'kode'=> 'required|string',
                    'nama'=> 'required|string',
                    'tmp_lahir'=> 'required|string',
                    'tgl_lahir'=> 'required|string',
                    'gender'=> 'required|string',
                    'email'=> 'required|string',
                    'alamat'=> 'required|string',
                    'kelurahan_nama' =>'required|string'
                ]);
                Pasien::create($validated);
                return redirect('dashboard/pasien');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pasien = Pasien::find($id);
        return view('admin.pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
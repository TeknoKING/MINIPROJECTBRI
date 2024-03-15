<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', ['kelass' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKelasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|min:4|unique:kelas',
            'fakultas' => 'required|min:4',
            'jurusan' => 'required|min:4',
            'tingkat' => 'required',
        ]);

        Kelas::create($validatedData);
        return redirect('/kelas')->with('success', 'Kelas successfully addes.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrfail($id);
        return view('kelas.edit', [
            'kelas' => $kelas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKelasRequest  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $rules = [
            'nama_kelas' => 'required|min:4',
            'fakultas' => 'required|min:4',
            'jurusan' => 'required|min:4',
            'tingkat' => 'required',
        ];

        if ($request->nama_kelas != $kelas->nama_kelas) {
            $rules['nama_kelas'] .= '|unique:kelas';
        }

        $validatedData = $request->validate($rules);

        Kelas::where('id', $id)->update($validatedData);
        return redirect('kelas')->with('success', 'Class has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isAlreadyUsed = Attendance::where('id_kelas', $id)->exists();

        if ($isAlreadyUsed) {
            return redirect('kelas')->with('error', "You cannot delete this class because it is already used");
        };
        Kelas::destroy($id);
        return redirect('kelas')->with('success', 'Class has been deleted');
    }
}

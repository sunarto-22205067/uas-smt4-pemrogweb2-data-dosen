<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Requests\DosenRequest;
use Illuminate\Validation\Rule;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(DosenRequest $request)
    {
        $data = $request->validated();

        // Pastikan NID unik sebelum menyimpan
        $dosen = Dosen::firstOrNew(['nid' => $data['nid']]);
        if ($dosen->exists) {
            return redirect('/add-dosen')->with('error', 'Nomor NID Yang Anda Masukan Sudah Ada!');
        }

        $dosen->fill($data)->save();

        return redirect('/add-dosen')->with('message', 'Dosen Added Successfully');
    }

    public function edit($dosen_id)
    {
        $dosens = Dosen::find($dosen_id);
        return view('dosen.edit', compact('dosens'));
    }

    public function update(DosenRequest $request, $dosen_id)
    {
        $data = $request->validated();

        // Pastikan NID unik saat memperbarui
        $existingDosen = Dosen::where('id', '!=', $dosen_id)->where('nid', $data['nid'])->exists();
        if ($existingDosen) {
            return redirect()->back()->with('error', 'NID already exists');
        }

        $dosen = Dosen::findOrFail($dosen_id);
        $dosen->update($data);

        return redirect('/dosen')->with('message', 'Dosen Update Successfully');
    }

    public function destroy($dosen_id)
    {
        $dosen = Dosen::find($dosen_id);
        if ($dosen) {
            $dosen->delete();
            return redirect('/dosen')->with('message', 'Dosen Deleted Successfully');
        }
        return redirect('/dosen')->with('error', 'Dosen not found');
    }
}

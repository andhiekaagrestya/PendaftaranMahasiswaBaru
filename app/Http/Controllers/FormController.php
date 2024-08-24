<?php

namespace App\Http\Controllers;

use App\Models\agama;
use App\Models\kabupaten;
use App\Models\MFormulir;
use App\Models\provinsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class FormController extends Controller
{

    public function getKabupaten($provinsiId)
    {
        $data = kabupaten::where('id_provinsi', $provinsiId)->get();
        return response()->json($data);
    }

    public function main()
    {
        $dataAgama = agama::all();
        $dataProvinsi = provinsi::all();
        return view('form.index', ['dataProvinsi' => $dataProvinsi, 'dataAgama' => $dataAgama]);
    }

    public function pendaftaran(Request $request)
    {

        $validateData = $request->validate([
            'id_users' => 'required',
            'nama' => 'required',
            'alamat_ktp' => 'required',
            'alamat_sekarang' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'kewarganegaraan' => 'required',
            'tanggal_lahir' => 'required',
            'provinsi_lahir' => 'required',
            'kabupaten_lahir' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'status_menikah' => 'required',
            'agama' => 'required',
            'foto' => 'required|image',
        ]);

        $namaFoto = '';
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $namaFoto = $image->hashName();
            $image->move(public_path('foto'), $namaFoto);

            // Simpan nama file dalam $validateData untuk disimpan di database
            $validateData['foto'] = $namaFoto;
        }

        // Convert IDs to Names
        $provinsiName = provinsi::find($request->provinsi)->nama;
        $kabupatenName = kabupaten::find($request->kabupaten)->nama;
        $provinsiLahirName = provinsi::find($request->provinsi_lahir)->nama;
        $kabupatenLahirName = kabupaten::find($request->kabupaten_lahir)->nama;
        $agamaName = agama::where('nama', $request->agama)->first()->nama;

        // Assign converted names to $validateData
        $validateData['provinsi'] = $provinsiName;
        $validateData['kabupaten'] = $kabupatenName;
        $validateData['provinsi_lahir'] = $provinsiLahirName;
        $validateData['kabupaten_lahir'] = $kabupatenLahirName;
        $validateData['agama'] = $agamaName;


        MFormulir::create($validateData);
        Session::flash('alert-success', 'Pendaftaran Berhasil'); // kasih pesan success
        return redirect()->intended(route('dashboard.user'));
    }
}
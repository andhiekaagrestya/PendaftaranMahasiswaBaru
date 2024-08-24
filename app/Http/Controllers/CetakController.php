<?php

namespace App\Http\Controllers;

use App\Models\kota;
use App\Models\MFormulir;
use App\Models\provinsi;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use PDF;


class CetakController extends Controller
{
    public function main(Request $request)
    {
        $id = $request->query('id');
        $dataUser = MFormulir::where('id_users', $id)->get();

        return view('cetak.index', ['dataUser' => $dataUser]);
    }

    public function cetak(Request $request)
    {
        $id = $request->query('id');
        $dataUser = MFormulir::where('id', $id)->get();

        // Pass data to the view
        $pdf = PDF::loadView('cetak.view-cetak', ['dataUser' => $dataUser]);

        $pdf->setPaper('A4', 'landscape');

        // Return PDF as a download
        return $pdf->download('pendaftaran.pdf');
    }
}
<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Imports\ClientImport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{

    public function index()
    {

        return view('Imports.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputFile' => 'required|file|max:25000|mimes:xlsx',
        ]);
       ini_set('memory_limit', '2048M');
        $file = $request->file('inputFile');
        $import = new ClientImport();
        $import->import($file);

        return back()->with('success', 'Excel importado con exito');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function export(Excel $excel)
    {
        ini_set('memory_limit', '-1');
        return Excel::download(new ClientsExport,'clients.xlsx');
    }
}

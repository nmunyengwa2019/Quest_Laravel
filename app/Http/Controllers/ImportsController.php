<?php

namespace App\Http\Controllers;
use App\Imports\GroupsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ImportsController extends Controller
{
    public function store(Request $request)
    {
         $path = $request->file('file');
         
         (new GroupsImport)->Import($path);

        return back()->withStatus('Data imported successfully!');    }
}

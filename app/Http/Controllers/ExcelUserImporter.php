<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel;

class ExcelUserImporter extends Controller
{
  /**
  * @return \Illuminate\Support\Collection
  */
  public function importExportView()
  {
     return view('import');
  }


  /**
  * @return \Illuminate\Support\Collection
  */
  public function import()
  {
      Excel::import(new ImportUsers,request()->file('file'));

      return back();
  }
}

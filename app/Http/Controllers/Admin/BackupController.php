<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.respaldos.index');
    }

    public function show()
    {
        return view('admin.respaldos.index');
    }
    //no tengo idea por que  esta pasando eso :(
}

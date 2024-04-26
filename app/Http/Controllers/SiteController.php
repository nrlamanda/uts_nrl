<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function tambahNama()
    {
        return view('form');
    }
    public function nama()
    {
        $arr = [
            ['nama' => 'mark', 'angka' => '1' , 'umur' => '12'],
            ['nama' => 'zuck', 'angka' => '2' , 'umur' => '13'],
            ['nama' => 'berg', 'angka' => '3' , 'umur' => '14'],
        ];
        return view('nama', compact('arr'));
    }
}

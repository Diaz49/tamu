<?php

namespace App\Http\Controllers;

use App\Models\KerjaSama;
use Illuminate\Http\Request;

class KerjaSamaController extends Controller
{
    public function lihat(){
        return view('pages.humas.data-mou.kerjasama-mou',[
            'title' => 'kerjasama-mou',
        ]);
    }

}   
<?php

namespace App\Http\Controllers;

use App\Models\KerjaSama;
use Illuminate\Http\Request;

class KerjaSamaController extends Controller
{
    public function lihat(){
        return view('pages.humas.data-mou.data-kerjasama', [
            'title' => 'kerjasama-mou',
            'mou'=> KerjaSama::get(),
        ]);
    }

    public function create(){
        return view('pages.humas.data-mou.kerjasama-mou',[
            'title' =>  "Tambah Data MoU",
            'mou'=> KerjaSama::get(),
            
        ]);
    }

    
    // public function edit() {
    //     return view('paged.humas.data-mou.kerjasama-mou',[
    //         'title' => 'kerjasama-mou',
    //         'mou'=> KerjaSama::get(),
    //     ]);
    // }
}   
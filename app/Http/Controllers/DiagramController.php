<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klub; 

class DiagramController extends Controller
{
    
    public function index()
    {
       
        $klubAdatok = Klub::withCount('labdarugok')->get();

        
        $labels = $klubAdatok->pluck('csapatnev');
        $data = $klubAdatok->pluck('labdarugok_count'); 

       
        return view('diagram.index', [
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
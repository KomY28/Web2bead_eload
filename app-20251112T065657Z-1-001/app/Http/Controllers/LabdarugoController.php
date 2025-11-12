<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Labdarugo; 

class LabdarugoController extends Controller
{
    
    public function index()
    {
       
        $labdarugok = Labdarugo::with(['klub', 'poszt'])
            ->orderBy('ertek', 'desc') 
            ->get();

        
        return view('labdarugok.index', [
            'labdarugok' => $labdarugok
        ]);
    }
}
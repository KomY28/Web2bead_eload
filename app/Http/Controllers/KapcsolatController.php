<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KapcsolatiUzenet; 

class KapcsolatController extends Controller
{
    
    public function index()
    {
        return view('kapcsolat.index');
    }

    
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'targy' => 'nullable|string|max:255',
            'uzenet' => 'required|string|min:10',
        ]);

       
        KapcsolatiUzenet::create($validated);

       
        return redirect()->route('kapcsolat.index')
                         ->with('status', 'Üzenetét sikeresen elküldtük!');
    }
}
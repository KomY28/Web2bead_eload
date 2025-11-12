<?php

namespace App\Http\Controllers;

use App\Models\Klub; 
use Illuminate\Http\Request;

class KlubController extends Controller
{
    
    public function index()
    {
        $klubok = Klub::orderBy('csapatnev')->get();
        return view('klubok.index', ['klubok' => $klubok]);
    }

   
    public function create()
    {
        return view('klubok.create');
    }

    
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'csapatnev' => 'required|string|unique:klubok|max:255',
        ]);

        
        Klub::create($validated);

        return redirect()->route('klubok.index')->with('status', 'Klub sikeresen létrehozva!');
    }


    
    public function edit(Klub $klub)
    {
        return view('klubok.edit', ['klub' => $klub]);
    }

   
    public function update(Request $request, Klub $klub)
    {
        
        $validated = $request->validate([
            'csapatnev' => 'required|string|max:255',
        ]);

        
        $klub->update($validated);

        return redirect()->route('klubok.index')->with('status', 'Klub sikeresen módosítva!');
    }

   
    public function destroy(Klub $klub)
    {
        try {
            
            $klub->delete();
            return redirect()->route('klubok.index')->with('status', 'Klub sikeresen törölve!');
        
        } catch (\Illuminate\Database\QueryException $e) {
            
            return redirect()->route('klubok.index')->with('error', 'A klub nem törölhető, mert játékosok vannak hozzárendelve!');
        }
    }
}
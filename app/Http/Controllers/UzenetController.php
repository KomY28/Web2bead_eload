<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Uzenet;
use App\Models\User;

class UzenetController extends Controller
{
    
    public function index()
    {
        $userId = Auth::id();
        $uzenetek = Uzenet::where('cimzett_id', $userId)
                            ->with('kuldo')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('uzenetek.index', [
            'uzenetek' => $uzenetek
        ]);
    }

   
    public function create()
    {
        $cimzettek = User::where('id', '!=', Auth::id())->get();

        return view('uzenetek.create', [
            'cimzettek' => $cimzettek
        ]);
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cimzett_id' => 'required|exists:users,id',
            'targy' => 'required|string|max:255',
            'tartalom' => 'required|string|min:5',
        ]);

        Uzenet::create([
            'kuldo_id' => Auth::id(),
            'cimzett_id' => $validated['cimzett_id'],
            'targy' => $validated['targy'],
            'tartalom' => $validated['tartalom'],
        ]);

        return redirect()->route('uzenetek.index')
                         ->with('status', 'Üzenet sikeresen elküldve!');
    }

    
    public function sent()
    {
        $userId = Auth::id();

        $uzenetek = Uzenet::where('kuldo_id', $userId)
                            ->with('cimzett')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('uzenetek.sent', [
            'uzenetek' => $uzenetek
        ]);
    }

   
    public function show($id)
    {
        $userId = Auth::id();
        
       
        $uzenet = Uzenet::with(['kuldo', 'cimzett'])->findOrFail($id);

       
        if ($uzenet->kuldo_id != $userId && $uzenet->cimzett_id != $userId) {
            abort(403, 'Nincs jogosultságod megtekinteni ezt az üzenetet.');
        }

       
        if ($uzenet->cimzett_id == $userId && is_null($uzenet->olvasva_ekkor)) {
            $uzenet->olvasva_ekkor = now(); 
            $uzenet->save();
        }

      
        return view('uzenetek.show', [
            'uzenet' => $uzenet
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search');
    
        $query = Persona::query();
    
        if ($search) {
            $query->where('nombre', 'like', "%$search%")
                  ->orWhere('apellido', 'like', "%$search%")
                  ->orWhere('cargo', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
                  
        }
    
        $personas = $query->paginate($perPage);
    
        return response()->json($personas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        return response()->json($persona);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        //
    }
}

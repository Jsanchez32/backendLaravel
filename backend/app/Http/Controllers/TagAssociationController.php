<?php

namespace App\Http\Controllers;

use App\Models\TagAssociation;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagAssociationController extends Controller
{
    public function index(Request $request)
    {
        // Obtener los parámetros de la solicitud
        $nombreNivel1 = $request->input('nombre_nivel1');
        $nombreNivel2 = $request->input('nombre_nivel2');
        $nombreNivel3 = $request->input('nombre_nivel3');
        $nombreNivel4 = $request->input('nombre_nivel4');

        // Construir la consulta dinámica
        $tagAssociations = TagAssociation::query();

        // Filtrar por el nivel 1
        if ($nombreNivel1 !== null) {
            $nivel1 = Tag::where('nombre', $nombreNivel1)->value('id');
            $tagAssociations->where('nivel1', $nivel1);
        }
    
        if ($nombreNivel2 !== null) {
            $nivel2 = Tag::where('nombre', $nombreNivel2)->value('id');
            $tagAssociations->where('nivel2', $nivel2);
        }
    
        if ($nombreNivel3 !== null) {
            $nivel3 = Tag::where('nombre', $nombreNivel3)->value('id');
            $tagAssociations->where('nivel3', $nivel3);
        }
    
        if ($nombreNivel4 !== null) {
            $nivel4 = Tag::where('nombre', $nombreNivel4)->value('id');
            $tagAssociations->where('nivel4', $nivel4);
        }

        // Obtener los resultados paginados
        $resultado = $tagAssociations->paginate(10);

        $resultado->transform(function ($item) {
            $item->nivel1 = Tag::find($item->nivel1)->nombre;
            $item->nivel2 = Tag::find($item->nivel2)->nombre;
            $item->nivel3 = Tag::find($item->nivel3)->nombre;
            $item->nivel4 = Tag::find($item->nivel4)->nombre;
            return $item;
        });


        // Devolver los resultados paginados como JSON
        return response()->json($resultado);
    }
}


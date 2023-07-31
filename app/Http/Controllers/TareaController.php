<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        //$this->middleware('auth:sanctum')->except(['index']);
    }
    public function index()
    {
        $tareas = Tarea::all();
        return $tareas;
    }

    public function create(Request $request)
    {
        $tarea = new Tarea();
        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->done = $request->done;
        $tarea->fecha_entrega = Carbon::parse($request->fecha_entrega);

        $tarea->save();
    }

    public function show($id)
    {
        $tarea = Tarea::find($id);
        return $tarea;
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($request->id);
        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->done = $request->done;
        $tarea->fecha_entrega = Carbon::parse($request->fecha_entrega);

        $tarea->save();
        return $tarea;
    }

    public function delete($id)
    {
        $tarea = Tarea::destroy($id);
        return $tarea;
    }
}

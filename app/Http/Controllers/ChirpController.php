<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Redireccionamos la ruta del index
        // Esta es la forma mas antigua y comun de obtener los registros por orden
//         $chirps = Chirp::orderBy('created_at', 'desc')->get();

        //Esta es la forma mas practica de hacerlo si lo queremos ordenar, BASADO EN EL 'CREATED_AT'
        $chirps = Chirp::with('users')->latest()->get();
         $data = $chirps->isEmpty();


        return view('chirps.index', compact('chirps', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mostramos la vista de detalles Show
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validando los datos antes de enviar a la BD
        $validated = $request->validate([
            'message' => ['required', 'min:5', 'max:255']
        ]);
        //Vamos a crear un nuevo chirp
        // auth()->user() accedo al usuario autenticado y luego a su relacion con la tabla chirps
        auth()->user()->chirps()->create($validated);
        return to_route('chirps.index')->with('status',  __('Chirps created successfully!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //En esta funcion voy a obtener el chirp y lo voy a editar
        $users = User::all();
        return view('chirps.edit', compact('chirp', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //La vista edit muestra el formulario con los datos a editar y la vista Update recibe esos datos y los actualiza

        $chirp = Chirp::find($request->id);
        $chirp->update([
            'message' => $request->message,
            'user_id' => $request->user_id
        ]);

        return to_route('chirps.index')->with(session()->flash('status', __('Chirps updated successfully!')));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //elimar un chirp
        $chirp = Chirp::findOrFail($id);
        $chirp->delete();
        return to_route('chirps.index')->with(session()->flash('status', __('Chirps deleted successfully!')));
    }
}

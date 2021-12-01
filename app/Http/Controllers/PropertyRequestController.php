<?php

namespace App\Http\Controllers;

use App\models\Thing;
use App\models\PropertyRequest;
use App\Http\Controllers\Lista;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PropertyRequestController extends Controller
{
       /**
     * Muestra los request.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Muestra el formulario para crear un nuevo request.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idThing)
    {
    	$INTEREST_GRADE = Lista::INTEREST_GRADE;
        return view('nueva_solicitud', compact('idThing','INTEREST_GRADE'));
    }

    /**
     * Guarda una nueva solicitud en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            PropertyRequest::create([
                'user_id'=>request('user_id'),
                'thing_id'=>request('idThing'),
                'request_type'=>0,
                'request_state'=>1,
                'degree_interest'=>request('interes'),
                'message'=>request('mensaje')
            ]);
            //conseguimos el ultimo id
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        
        toast('Enviado con exito','success')->position('top-end');
        return redirect()->route('ver_articulo', request('idThing'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idPost)
    {
    	
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Elimina un post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

    }
}

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
     * Muestra los request enviados.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = PropertyRequest::where('user_id', auth()->user()->id)
        ->join('thing', 'property_request.thing_id', '=', 'thing.thing_id')
        ->get();
        $REQUEST_STATE=Lista::REQUEST_STATE;
        return view('mis_solicitudes', compact('requests','REQUEST_STATE'));
    }

    /**
     * Muestra los request recibidos.
     *
     * @return \Illuminate\Http\Response
     */
    public function recibidas()
    {
        /*$requests = Thing::select('*')
        ->join('property_request', 'thing.thing_id', '=', 'property_request.thing_id')
        ->join('post', 'thing.post_id', '=', 'post.id')
        ->where('post.user_id', auth()->user()->id)
        ->get();*/
        $requests = PropertyRequest::where('request_state', '!=', 4)
        ->join('thing', 'property_request.thing_id', '=', 'thing.thing_id')
        ->join('post', 'thing.post_id', '=', 'post.id')
        ->join( 'users as usr', DB::raw( 'property_request.user_id' ), '=', DB::raw( 'usr.id' ) )
        ->select( 'property_request.*','thing.*', DB::raw( 'usr.name, usr.id as usrId') )
        ->where('post.user_id', auth()->user()->id)
        ->get();
        $REQUEST_STATE_2=Lista::REQUEST_STATE_2;
        //return $requests;
        return view('solicitudes_recibidas', compact('requests','REQUEST_STATE_2'));
    }

    /**
     * Muestra los request recibidos.
     *
     * @return \Illuminate\Http\Response
     */
    public function check($request)
    {
        $requests = PropertyRequest::where('request_state', '!=', 4)
        ->join('thing', 'property_request.thing_id', '=', 'thing.thing_id')
        ->join('post', 'thing.post_id', '=', 'post.id')
        ->join( 'users as usr', DB::raw( 'property_request.user_id' ), '=', DB::raw( 'usr.id' ) )
        ->select( 'property_request.*','thing.*', DB::raw( 'usr.name, usr.id as usrId') )
        ->where('property_request.id', $request)
        ->get();
        $REQUEST_STATE_2=Lista::REQUEST_STATE_2;
        
        return view('solicitud_revisar', compact('requests','REQUEST_STATE_2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function denegarRequest($idRequest)
    {
        PropertyRequest::where('id', $idRequest)->update(['request_state'=>3]);
        //$INTEREST_GRADE = Lista::INTEREST_GRADE;
        //return $thing[0]->thing_id;
        return redirect()->route('solicitudes_recibidas');
        
    }

    /**
     * Aceptar solicitud.
     *
     * @return \Illuminate\Http\Response
     */
    public function aceptarRequest($idRequest)
    {
        return view('nueva_respuesta_solicitud', compact('idRequest'));
    }


    /**
     * Manda los datos a un request.
     *
     * @return \Illuminate\Http\Response
     */
    public function mandarRequestResponse($idRequest)
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
    public function edit($idRequest)
    {
    	$requests = PropertyRequest::where('id', $idRequest)->get();
        return view('editar_solicitud', compact('idRequest','requests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function readOnly($idRequest)
    {
        $requests = PropertyRequest::where('id', $idRequest)->get();
        return view('solicitud_eliminada', compact('idRequest','requests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeEdit(Request $request)
    {
        PropertyRequest::where('id', request('idRequest'))->update(['message'=>request('mensaje'),'degree_interest'=>request('interes')]);
        return redirect()->route('solicitudes_enviadas');
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

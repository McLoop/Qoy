<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Lista;
use App\models\PropertyRequest;
use App\models\Thing;
use App\models\User;
use App\models\RequestResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RequestResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idRequest=request('idRequest');
        DB::beginTransaction();
        try {
            RequestResponse::create([
                'user_id'=>request('user_id'),
                'property_request_id'=>request('idRequest'),
                'message'=>request('mensaje'),
                'request_response_type'=>0,
                'request_response_state'=>1
            ]);
            //conseguimos el ultimo id
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        PropertyRequest::where('id', $idRequest)->update(['request_state'=>2]);
        $thing=PropertyRequest::where('id', $idRequest)->get('thing_id');
        //$INTEREST_GRADE = Lista::INTEREST_GRADE;
        //return $thing[0]->thing_id;
        Thing::where('thing_id', $thing[0]->thing_id)->update(['thing_state'=>2]);
        return redirect()->route('solicitudes_recibidas');
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idRequest)
    {
        $response=RequestResponse::where('property_request_id',$idRequest)->get();
        $userId=RequestResponse::where('property_request_id',$idRequest)->get('user_id');
        $users=User::where('id',$userId[0]->user_id)->get();
        $user_ubication=Lista::UBICATION;
        return view('ver_response', compact('response','users','user_ubication'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

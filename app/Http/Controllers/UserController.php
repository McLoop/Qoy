<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Lista;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use Carbon\Carbon;
use App\models\Ubication;


class UserController extends Controller
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
     * Logeo con correo y contraseña.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginNormal(Request $request)
    {
        $user=User::where('email',request('usuario'))->get();
        $user=$user->get(0);
        if (Hash::check(request('password'), $user->password)) {
            auth()->login($user, false);
            alert()->success('No olvides configurar tu perfil', 'Login con exito');
            return redirect()->route('editar_perfil');
        }else{
            return redirect()->route('login')->with('info', 'Credenciales incorrectas, vuelve a intentarlo.');;
        }
        //return $user;
    }

    /**
     * Configura un perfil por primera vez.
     *
     * @return \Illuminate\Http\Response
     */
    public function setPerfil()
    {
        //sacamos las ubicaiones de bdd
        $ubicacion = Ubication::where('ubication_status', 1)->get();
        if (auth()->user()->user_state==0) {
            toast('Primero debes configurar tu perfil','info');
        } else {
            
        }
        $user_types = Lista::USER_TYPES;
        $user_types_message = Lista::USER_TYPES_MESSAGE;
        $user_status = Lista::USER_STATUS;
        $regiones = Lista::REGION;
        $user_ubication = Lista::UBICATION;
        $zonas = Lista::ZONA;
        return view('perfil', compact('user_types', 'user_status','ubicacion', 'regiones', 'zonas', 'user_ubication','user_types_message'))->with('info', 'Configura tu zona de residencia.');
    }

    /**
     * Configura la ubicacion un perfil..
     *
     * @return \Illuminate\Http\Response
     */
    public function setUbication(Request $request)
    {
        //si el usuario no tiene ubicacion la creamos
        if (auth()->user()->user_state==0) {
         User::where('id', auth()->user()->id)->update(['user_ubication'=>request('ubication')]);
         User::where('id', auth()->user()->id)->update(['user_state'=>1]);
         User::where('id', auth()->user()->id)->update(['user_type'=>1]);
        } else {
        //si el usuario ya tiene ubicacion la actualizamos
         User::where('id', auth()->user()->id)->update(['user_ubication'=>request('ubication')]);
        }
        return redirect()->route('editar_perfil')->with('info', 'Ubicación agregada correctamente');
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

        //foto
        $ruta='/images/avatar/';
        $foto;
        if(request('fotoDefault')==1)
        {
            $foto = $ruta.'default.png';
        }
        else{
            if ($foto = User::setImagen(request('foto_up'))) {
                    }else{
                        $foto = $ruta.'default.png';
                    }
        }
        // fin foto
        DB::beginTransaction();
        try {
            User::create([
                'name'=>request('nombre'),
                'email'=>request('correo'),
                'provider'=>request('provider'),
                'provider_id'=>request('provider_id'),
                'avatar'=>$foto,
                'password'=>Hash::make(request('password')),
                'user_type'=>1
                //'created_at'=>Carbon::now()->toDateTimeString(),
                //'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
            //conseguimos el ultimo id
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        //dd($request->all());
        $user=User::where('email',request('correo'))->get();
        $user=$user->get(0);
        if (Hash::check(request('password'), $user->password)) {
            auth()->login($user, false);
            alert()->success('No olvides configurar tu perfil', 'Login con exito');
            return redirect()->route('editar_perfil');
        }else{
            return redirect()->route('login')->with('info', 'Credenciales incorrectas, vuelve a intentarlo.');;
        }
        return redirect()->route('editar_perfil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ubicacion = Ubication::where('ubication_status', 1)->get();
        $user_types = Lista::USER_TYPES;
        $user_status = Lista::USER_STATUS;
        $user_message = Lista::USER_MESSAGE;
        $regiones = Lista::REGION;
        $user_ubication = Lista::UBICATION;
        $zonas = Lista::ZONA;
        $user = User::where('id', $id)->get();
        if($user!=null)
        {
        return view('perfil_usuario', compact('user_types', 'user_status', 'user_message', 'ubicacion', 'regiones', 'zonas','user', 'user_ubication'));

        }
        
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

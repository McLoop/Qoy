<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Lista;
use Illuminate\Support\Facades\Auth;
use App\models\User;


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
        //$zona = Zona::where('idZona', auth()->user()->idZona)->get();
        toast('Primero debes configurar tu perfil','info');
        $user_types = Lista::USER_TYPES;
        $user_status = Lista::USER_STATUS;
        return view('perfil', compact('user_types', 'user_status'))->with('info', 'Configura tu zona de residencia.');
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
        //
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

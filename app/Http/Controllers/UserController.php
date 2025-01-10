<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ViewErrorBag;
use App\Http\Controllers\Lista;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use App\models\Ubication;
use App\models\Interest;
use App\models\Category;
use Carbon\Carbon;


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
        /*Validacion*/
        $request->validate([
            'usuario' => ['required', 'email'],
            'password' => ['required', 'min:5'],
        ]);
        /*Validacion*/

        $user=User::where('email',request('usuario'))->get();
        $user=$user->get(0);
        if (empty($user)) {
            return redirect()->route('login')->with('info','No hay un usuario registrado con este correo.');
        } else {
            if (Hash::check(request('password'), $user->password)) {
                $recuerdame = request()->filled('recordar');
                auth()->login($user, $recuerdame);
                alert()->success('No olvides configurar tu perfil', 'Login con exito');
                return redirect()->route('editar_perfil');
            }else{
                return redirect()->route('login')->with('info','Credenciales incorrectas, vuelve a intentarlo.');
            }
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
        } else {}
        if (auth()->user()->user_type==4) {
            alert('EN ESPERA','Mientras se aprueba tu solicitud de cambio, tu perfil aparecera "en espera", puedes usar todas las funciones de Qoy con normalidad.','info');
        } else {}
            

        $user_types = Lista::USER_TYPES;
        $user_types_message = Lista::USER_TYPES_MESSAGE;
        $user_message = Lista::USER_MESSAGE;
        $user_status = Lista::USER_STATUS;
        $regiones = Lista::REGION;
        $user_ubication = Lista::UBICATION;
        $zonas = Lista::ZONA;
        return view('perfil', compact('user_types', 'user_status','ubicacion', 'regiones', 'zonas', 'user_ubication','user_types_message', 'user_message'))->with('info', 'Configura tu zona de residencia.');
    }

    /**
     * Configura los intereses de un perfil.
     *
     * @return \Illuminate\Http\Response
     */
    public function setPerfilInterest($user_id, $type)
    {
        //sacamos las ubicaiones de bdd
        $category = Category::where('category_status', 1)->get();
        if (auth()->user()->user_state==1) {
                alert('Selecciona tus intereses','Debes elegir 2 intereses primario y 2 secundarios como máximo.','info');
            } 
        if (auth()->user()->user_state==1 && $type=='secundario') {
                $interest = Interest::where('user_id', $user_id)->where('interest_type', 1)->get();
                return view('interest_secundario', compact('interest', 'category'));
            }
        if(auth()->user()->user_state>=2){
            
            $interest = Interest::where('user_id', $user_id)->where('interest_type', 1)->get();
            $interestSec = Interest::where('user_id', $user_id)->where('interest_type', 2)->get();

            if ($type=='primarios') {
                return view('editar_interest', compact('interest', 'category','interestSec'));
            } else if ($type=='secundarios'){
                return view('editar_interest_secundario', compact('interest', 'category','interestSec'));
            }
        }else{
                return view('interest', compact('category'));

        }
        
    }


    /**
     * Guarda los intereses primarios de un perfil.
     *
     * @return \Illuminate\Http\Response
     */
    public function setPerfilPrimaryInterest()
    {
        //sacamos las ubicaiones de bdd
        Interest::create([
                'user_id'=>request('user'),
                'category_id'=>request('primario1'),
                'interest_type'=>1,
                'interest_status'=>1
            ]);
        Interest::create([
                'user_id'=>request('user'),
                'category_id'=>request('primario2'),
                'interest_type'=>1,
                'interest_status'=>1
            ]);
        return redirect()->route('editar_intereses', [auth()->user()->id,'secundario']);
    }

    /**
     * Edita los intereses primarios de un perfil.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPerfilPrimaryInterest(Request $request)
    {
        //sacamos las ubicaiones de bdd
        $interest = Interest::where('user_id', request('user'))
        ->where('interest_type',1)->get();
        Interest::where('id', $interest[0]->id)
        ->update(['category_id'=>request('primario1')]);
        Interest::where('id', $interest[1]->id)
        ->update(['category_id'=>request('primario2')]);
        return redirect()->route('editar_intereses', [auth()->user()->id,'secundarios']);
    }

    /**
     * Muestra la vista para cambiar a Empresa.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPerfilType()
    {
        //sacamos las ubicaiones de bdd
        alert('CAMBIAR A EMPRESA','Lee los terminos y condiciones antes de proceder a un cambio de cuenta.','info');
        return view('perfil_empresa');
    }

    /**
     * Cambia una cuenta a empresarial.
     *
     * @return \Illuminate\Http\Response
     */
    public function setPerfilType($user_id, $type)
    {
        //sacamos las ubicaiones de bdd
        if($type == 'solicitud'){
            User::where('id', $user_id)->update(['user_type'=>4]);
            return redirect()->route('editar_perfil');
        }
        if($type == 'cambioEmpresa'){
            User::where('id', $user_id)->update(['user_type'=>3]);
            //cambiar para admin
            return redirect()->route('editar_perfil');

        }

        //return redirect()->route('editar_intereses', [auth()->user()->id,'secundarios']);
    }

    /**
     * Guarda los intereses secundarios de un perfil.
     *
     * @return \Illuminate\Http\Response
     */
    public function setPerfilSecondaryInterest()
    {
        //sacamos las ubicaiones de bdd
        Interest::create([
                'user_id'=>request('user'),
                'category_id'=>request('secundario1'),
                'interest_type'=>2,
                'interest_status'=>1
            ]);
        Interest::create([
                'user_id'=>request('user'),
                'category_id'=>request('secundario2'),
                'interest_type'=>2,
                'interest_status'=>1
            ]);
        User::where('id', request('user'))->update(['user_state'=>2]);
        return redirect()->route('editar_perfil');
    }

    /**
     * Edita los intereses primarios de un perfil.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPerfilSecondaryInterest(Request $request)
    {
        //sacamos las ubicaiones de bdd
        $interest = Interest::where('user_id', request('user'))
        ->where('interest_type',2)->get();
        Interest::where('id', $interest[0]->id)
        ->update(['category_id'=>request('secundario1')]);
        Interest::where('id', $interest[1]->id)
        ->update(['category_id'=>request('secundario2')]);
        return redirect()->route('editar_perfil');
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
     * Configura la datos adicionales de un perfil..
     *
     * @return \Illuminate\Http\Response
     */
    public function addDatos(Request $request)
    {
        //si el usuario no tiene ubicacion la creamos
         User::where('id', auth()->user()->id)->update(['user_ci'=>request('carnet')]);
         User::where('id', auth()->user()->id)->update(['user_phone'=>request('tel')]);
         User::where('id', auth()->user()->id)->update(['user_dir'=>request('direccion')]);
         User::where('id', auth()->user()->id)->update(['user_dir'=>request('direccion')]);
         User::where('id', auth()->user()->id)->update(['user_state'=>4]);
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
        $user_types = Lista::USER_TYPES;
        $user_status = Lista::USER_STATUS;
        $user_message = Lista::USER_MESSAGE;
        $regiones = Lista::REGION;
        $user_ubication = Lista::UBICATION;
        $zonas = Lista::ZONA;
        $user = User::where('id', $id)->get();
        $user=$user->get(0);
        if($user!=null)
        {
        return view('perfil_usuario', compact('user_types', 'user_status', 'user_message', 'user', 'regiones', 'zonas','user', 'user_ubication'));

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

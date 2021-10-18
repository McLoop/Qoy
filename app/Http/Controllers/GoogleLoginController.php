<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\Models\User;

 
class GoogleLoginController extends Controller
{
 
public function redirect($provider)
{
    $drivers=['google'];
    if (in_array($provider, $drivers)) {
      return Socialite::driver($provider)->redirect();
    }else{
    return redirect()->to('/login')->with('info', $provider.' no es  una aplicacion validad para logearse');
    }
}
 
public function callback($provider)
{
           
    $getInfo = Socialite::driver($provider)->stateless()->user();
     
    $user = $this->createUser($getInfo,$provider);
 
    auth()->login($user);
    if (auth()->user()->user_type=='0') {
    alert()->info('Bienvenido a Qoy', 'Hola');
        return redirect()->route('feed');//perfil

    }
    else{
        alert()->success('No olvides configurar tu perfil', 'Login con exito');
        return redirect()->route('feed');

    }
 
}

function createUser($getInfo,$provider){
 
 $user = User::where('provider_id', $getInfo->id)->first();
 
 if (!$user) {
     $user = User::create([
        'name'     => $getInfo->name,
        'email'    => $getInfo->email,
        'provider' => $provider,
        'provider_id' => $getInfo->id,
        'avatar' => $getInfo->avatar
    ]);
  }
  return $user;
}

public function logout()
{
    auth()->logout();
    alert()->success('Vuelve Pronto', 'Cerraste sesión');
    return redirect()->to('/login');
 
}

}
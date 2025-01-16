<?php
 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Cookie;

 
class GoogleLoginController extends Controller
{
 
public function redirect($provider)
{
    $drivers=['google','facebook'];
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
 
    auth()->login($user, true);
    //Cookie::queue('darkMode', 'white', 60);
    if (auth()->user()->user_state=='0') {
        return redirect()->route('editar_perfil');//perfil
    }
    else{
        toast('Loggeo con exito','success')->position('top-end');
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
    alert()->success('Logout','Se cerró tu sesión');
    return redirect()->to('login');
}

}
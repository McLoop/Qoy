<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Lista;
use Illuminate\Support\Facades\Auth;
use App\models\Thing;
use App\models\User;
use App\models\Ubication;
use App\models\Achievement;
use App\models\Interest;
use App\models\PropertyRequest;
use App\models\Post;
use App\models\Category;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Muestra todos los post al admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPosts()
    {
        $things = Thing::
        join('post', 'thing.post_id', '=', 'post.id')
        ->join('users', 'post.user_id', '=', 'users.id')
        ->orderBy('thing.thing_id', 'DESC')
        ->paginate(10);

        $POST_STATE=Lista::POST_STATE;
        $ubication = Lista::UBICATION;
        $thing_status=Lista::THING_STATUS;
        $thing_state=Lista::THING_STATE;
        $category_list=Lista::CATEGORY;
        return view('post', compact('things','POST_STATE','ubication','thing_state','category_list'));
    }

    /**
     * Da de baja un articulo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bajaThing($id, $idPost)
    {
        
        Thing::where('thing_id', $id)->update(['thing_state'=>5]);
        return redirect()->route('publicaciones_qoy')->with('info','Publicación dado de baja con éxito.');
        /**/
        //$post->delete();
    }

    /**
     * Muestra todos los usuarios al admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUsers()
    {
        $flag=0;
        $users = User::
        orderBy('users.id', 'DESC')
        ->paginate(10);

        $ubication = Lista::UBICATION;
        $user_types=Lista::USER_TYPES;
        $user_status=Lista::USER_STATUS;
        return view('users', compact('users','user_types','ubication','user_status','flag'));
    }

    /**
     * Ver un usuario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUser($id)
    {
        //sacamos logros
        $logros = Achievement::where('user_id', $id)->get();
        $user_types = Lista::USER_TYPES;
        $user_status = Lista::USER_STATUS;
        $user_message = Lista::USER_MESSAGE;
        $regiones = Lista::REGION;
        $user_ubication = Lista::UBICATION;
        $zonas = Lista::ZONA;
        $user = User::where('id', $id)->get();
        $user=$user->get(0);
        //post del usuario
        $posts = Post::where('user_id', $id)->get();
        $POST_STATE=Lista::POST_STATE;
        //solicitudes del usuario
        $requests = PropertyRequest::where('user_id', $id)
        ->join('thing', 'property_request.thing_id', '=', 'thing.thing_id')
        ->get();
        $REQUEST_STATE=Lista::REQUEST_STATE;
        if($user!=null)
        {
        return view('perfil_usuario', compact('user_types', 'user_status', 'user_message', 'user', 'regiones', 'zonas','user', 'user_ubication','logros','posts','POST_STATE','requests','REQUEST_STATE'));

        }
        
    }

    /**
     * Da de baja un usuario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bajaUser($id)
    {
        
        User::where('id', $id)->update(['user_state'=>5]);
        return redirect()->route('usuarios_qoy')->with('msg','Usuario dado de baja con éxito.');
        /**/
        //$post->delete();
    }


    /**
     * Muestra todas las solicitudes para cambio de empresa.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSolis()
    {
        $flag=1;
        $users = User::
        where('users.user_type','=',4)
        ->orderBy('users.id', 'DESC')
        ->paginate(5);

        $ubication = Lista::UBICATION;
        $user_types=Lista::USER_TYPES;
        $user_status=Lista::USER_STATUS;
        return view('users', compact('users','user_types','ubication','user_status','flag'));
    }
}

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
use App\models\Interest;
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
        ->paginate(5);

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
        return redirect()->route('publicaciones_qoy')->with('info','Publicación dad de baja con éxito.');
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
        ->paginate(5);

        $ubication = Lista::UBICATION;
        $user_types=Lista::USER_TYPES;
        $user_status=Lista::USER_STATUS;
        return view('users', compact('users','user_types','ubication','user_status','flag'));
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

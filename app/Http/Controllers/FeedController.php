<?php

namespace App\Http\Controllers;
use App\models\Interest;
use App\Http\Controllers\Lista;
use App\models\Thing;
use App\models\Category;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Muetsra el feed.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->user_type == 5) {
            $things = Thing::latest('thing.created_at')
            ->join('post', 'thing.post_id', '=', 'post.id')
            ->join('users', 'post.user_id', '=', 'users.id')
            ->orderBy('thing.thing_id', 'DESC')->get();
            //fin sacar publicaciones interes primario
            
            $ubication = Lista::UBICATION;
            $thing_status=Lista::THING_STATUS;
            $thing_state=Lista::THING_STATE;
            $category_list=Lista::CATEGORY;
            return view('feed', compact('things','thing_status','ubication','thing_state','category_list'));
        } else {
            //toast('Loggeo con exito','success')->position('top-end');
            //intereses
            if(auth()->user()->user_state>'1'){
            $interest = Interest::where('user_id', auth()->user()->id)->where('interest_type', 1)->get('category_id');
            $interestSec = Interest::where('user_id', auth()->user()->id)->where('interest_type', 2)->get('category_id');
            //return $interest[0]->id;
            //fin intereses
            //sacar publicaciones interes primario
            $things = Thing::latest('thing.created_at')
            ->join('post', 'thing.post_id', '=', 'post.id')
            ->join('users', 'post.user_id', '=', 'users.id')
            ->where('thing.thing_state', '<', '4')
            ->where('thing.category_id', $interest[0]->category_id)
            ->orWhere('thing.category_id', $interest[1]->category_id)
            ->orderBy('thing.thing_id', 'DESC')->get();
            //fin sacar publicaciones interes primario
            
            $ubication = Lista::UBICATION;
            $thing_status=Lista::THING_STATUS;
            $thing_state=Lista::THING_STATE;
            $category_list=Lista::CATEGORY;
            return view('feed', compact('things','thing_status','ubication','thing_state','category_list'));
            //return $things1;
            }else{
                return redirect()->route('editar_perfil');//perfil
            }
        }
        
        
    }

    /**
     * Carga dinamicamente los articulos segun intereses
     *
     * @return \Illuminate\Http\Response
     */
    public function pagination($pagina)
    {
        if (auth()->user()->user_type == 5) {
            $things=[];
                if($pagina==2){
                    //sacar publicaciones interes secundario
                    $things = Thing::latest('thing.created_at')
                    ->join('post', 'thing.post_id', '=', 'post.id')
                    ->join('users', 'post.user_id', '=', 'users.id')
                    ->orderBy('thing.thing_id', 'DESC')->get();
                    //fin sacar publicaciones interes secundario
                }
                if($pagina==3){
                    //sacar publicaciones cercanas
                    $things = Thing::latest('thing.created_at')
                    ->join('post', 'thing.post_id', '=', 'post.id')
                    ->join('users', 'post.user_id', '=', 'users.id')
                    ->orderBy('thing.thing_id', 'DESC')->get();
                    //fin sacar publicaciones cercanas
                }
                if($pagina==4){
                    //sacar todas las publicaciones
                    $things = Thing::latest('thing.created_at')
                    ->join('post', 'thing.post_id', '=', 'post.id')
                    ->join('users', 'post.user_id', '=', 'users.id')
                    //->where('thing.thing_state', 1)
                    ->orderBy('thing.thing_id', 'DESC')->get();
                    //fin sacar todas las publicaciones
                }

            $thing_status=Lista::THING_STATUS;
            $ubication = Lista::UBICATION;
            $thing_state=Lista::THING_STATE;
            $category_list=Lista::CATEGORY;
            return view('feed_pagination', compact('things','thing_status','ubication','thing_state','category_list'));
        } else {
            //intereses
            if(auth()->user()->user_state>'1'){
            $interest = Interest::where('user_id', auth()->user()->id)->where('interest_type', 1)->get('category_id');
            $interestSec = Interest::where('user_id', auth()->user()->id)->where('interest_type', 2)->get('category_id');
            //return $interest[0]->id;
            //fin intereses
            $things=[];
                if($pagina==2){
                    //sacar publicaciones interes secundario
                    $things = Thing::latest('thing.created_at')
                    ->join('post', 'thing.post_id', '=', 'post.id')
                    ->join('users', 'post.user_id', '=', 'users.id')
                    ->where('thing.thing_state', '<', '4')
                    ->where('thing.category_id', $interestSec[0]->category_id)
                    ->orWhere('thing.category_id', $interestSec[1]->category_id)
                    ->orderBy('thing.thing_id', 'DESC')->get();
                    //fin sacar publicaciones interes secundario
                }
                if($pagina==3){
                    //sacar publicaciones cercanas
                    $things = Thing::latest('thing.created_at')
                    ->join('post', 'thing.post_id', '=', 'post.id')
                    ->join('users', 'post.user_id', '=', 'users.id')
                    ->where('thing.thing_state', '<', '4')
                    ->where('thing.ubication', auth()->user()->ubication)
                    ->orderBy('thing.thing_id', 'DESC')->get();
                    //fin sacar publicaciones cercanas
                }
                if($pagina==4){
                    //sacar todas las publicaciones
                    $things = Thing::latest('thing.created_at')
                    ->join('post', 'thing.post_id', '=', 'post.id')
                    ->join('users', 'post.user_id', '=', 'users.id')
                    ->where('thing.thing_state', '<', '4')
                    //->where('thing.thing_state', 1)
                    ->orderBy('thing.thing_id', 'DESC')->get();
                    //fin sacar todas las publicaciones
                }

            $thing_status=Lista::THING_STATUS;
            $ubication = Lista::UBICATION;
            $thing_state=Lista::THING_STATE;
            $category_list=Lista::CATEGORY;
            return view('feed_pagination', compact('things','thing_status','ubication','thing_state','category_list'));
            }
        }
        
        
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
        //
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

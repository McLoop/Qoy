<?php

namespace App\Http\Controllers;
use App\models\Interest;
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
        //toast('Loggeo con exito','success')->position('top-end');
        //intereses
        if(auth()->user()->user_state>'1'){
        $interest = Interest::where('user_id', auth()->user()->id)->where('interest_type', 1)->get('category_id');
        $interestSec = Interest::where('user_id', auth()->user()->id)->where('interest_type', 2)->get('category_id');
        //return $interest[0]->id;
        //fin intereses
        //sacar publicaciones interes primario
        $things1 = Thing::latest('thing.created_at')
        ->join('post', 'thing.post_id', '=', 'post.id')
        ->join('users', 'post.user_id', '=', 'users.id')
        ->where('thing.category_id', $interest[0]->category_id)
        ->orWhere('thing.category_id', $interest[1]->category_id)
        ->orderBy('thing.thing_id', 'DESC')->get();
        //fin sacar publicaciones interes primario
        //sacar publicaciones interes secundario
        $things2 = Thing::latest('thing.created_at')
        ->join('post', 'thing.post_id', '=', 'post.id')
        ->join('users', 'post.user_id', '=', 'users.id')
        ->where('thing.category_id', $interestSec[0]->category_id)
        ->orWhere('thing.category_id', $interestSec[1]->category_id)
        ->orderBy('thing.thing_id', 'DESC')->get();
        //fin sacar publicaciones interes secundario
        //sacar publicaciones cercanas
        $things3 = Thing::latest('thing.created_at')
        ->join('post', 'thing.post_id', '=', 'post.id')
        ->join('users', 'post.user_id', '=', 'users.id')
        ->where('thing.ubication', auth()->user()->ubication)
        ->orderBy('thing.thing_id', 'DESC')->get();
        //fin sacar publicaciones cercanas
        //sacar todas las publicaciones
        $things4 = Thing::latest('thing.created_at')
        ->join('post', 'thing.post_id', '=', 'post.id')
        ->join('users', 'post.user_id', '=', 'users.id')
        ->where('thing.thing_state', 1)
        ->orderBy('thing.thing_id', 'DESC')->get();
        //fin sacar todas las publicaciones
        return view('feed', compact('things1','things2','things3', 'things4'));
        //return $things1;
        }else{
            return redirect()->route('editar_perfil');//perfil
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
     * Muestra las categorias.
     *
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        $category = Category::where('category_status', 1)->get();
        return view('categorias', compact('category'));
        
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

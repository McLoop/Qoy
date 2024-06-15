<?php

namespace App\Http\Controllers;
use App\models\Interest;
use App\Http\Controllers\Lista;
use App\models\Thing;
use App\models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
     * Muestra las categorias.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCategory($idCategoria)
    {
        //intereses
        //fin intereses
        //sacar publicaciones interes primario
        $things1 = Thing::latest('thing.created_at')
        ->join('post', 'thing.post_id', '=', 'post.id')
        ->join('users', 'post.user_id', '=', 'users.id')
        ->where('thing.category_id', $idCategoria)
        ->where('thing.thing_state','!=', 4)
        ->orderBy('thing.thing_id', 'DESC')->get();
        $thing_state=Lista::THING_STATE;
        $thing_status=Lista::THING_STATUS;
        
        //fin sacar publicaciones interes primario
        return view('mostrar_categoria', compact('things1','thing_state','thing_status'));
        //return $things1;
        
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

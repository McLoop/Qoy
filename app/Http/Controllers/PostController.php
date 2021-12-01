<?php

namespace App\Http\Controllers;
use App\models\Post;
use App\models\Thing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Muestra los post.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Muestra el formulario para crear un nuevo post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	DB::beginTransaction();
        try {
            Post::create([
                'user_id'=>auth()->user()->id,
                'post_type'=>0,
                'post_state'=>0
            ]);
            //conseguimos el ultimo id
            $idPost = Post::latest('id')->first();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    	
        return redirect()->route('editar_post', $idPost);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idPost)
    {
        $things = Thing::where('post_id', $idPost)->get();

        if($things->isEmpty()){
        	//borrar solo post
            toast('Añade primero algun artículo','error');
        	return redirect()->route('editar_post', $idPost);
        }else{
        	foreach ($things as $thing) {
				//mandar notificaciones
        		Thing::where('thing_id', $thing->thing_id)->update(['thing_state'=>1]);
        	}
        	Post::where('id', $idPost)->update(['post_state'=>1]);
            toast('Se realizo tu publicación','info');
		    return redirect()->route('feed');
        }
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
    public function edit($idPost)
    {
    	$things = Thing::where('post_id', $idPost)->get();
        return view('nuevo_post', compact('idPost','things'));
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
     * Elimina un post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

    }
}

<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Thing;
use App\models\Post;
use App\Http\Controllers\Lista;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ThingController extends Controller
{
    /**
     * Muestra los articulos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Muestra el formulario para añadir un articulo a un post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idPost)
    {
    	$category = Category::where('category_status', 1)->get();
        return view('nuevo_articulo', compact('idPost','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$ruta='/images/articulos/';
        $foto;
        $idPost=request('idPost');
        if(request('fotoDefault')==1)
        {
            $foto = $ruta.'default.png';
        }
        else{
            if ($foto = Thing::setImagenArticulo(request('foto_up'))) {
                    }else{
                        $foto = $ruta.'default.png';
                    }
        }

        DB::beginTransaction();
        try {
            Thing::create([
                'thing_name'=>request('nombre'),
                'description'=>request('descripcion'),
                'photo'=>$foto,
                'status'=>request('estado'),
                'thing_type'=>0,
                'thing_state'=>0,
                'post_id'=>$idPost,
                'ubication'=>1,
                'category_id'=>request('categoria')
            ]);
            //conseguimos el ultimo id
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return redirect()->route('editar_post', $idPost);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idThing)
    {
        $things = Thing::where('thing_id', $idThing)
        ->join('post', 'thing.post_id', '=', 'post.id')
        ->join('users', 'post.user_id', '=', 'users.id')->get();
        $thing_status = Lista::THING_STATUS;
        $thing_state = Lista::THING_STATE;
        return view('ver_articulo', compact('idThing','things','thing_status','thing_state'));
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
     * Remueve un articulo de un post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeThing($id, $idPost)
    {
        $thing = Thing::find($id);
		$thing->delete();
        return redirect()->route('editar_post', $idPost);
        /**/
		//$post->delete();
    }

    /**
     * Elimina los articulos y posteriormente cancela el post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPost)
    {
    	$things = Thing::where('post_id', $idPost)->get();

        if($things->isEmpty()){
        	//borrar solo post
        	$post = Post::find($idPost);
			$post->delete();
	        return redirect()->route('feed');
        }else{
        	foreach ($things as $thing) {
        		$thingDelet = Thing::find($thing->id);
				$thingDelet->delete();
        	}
        		$post = Post::find($idPost);
				$post->delete();
		        return redirect()->route('feed');
        }
        


        /**/
		//$post->delete();
    }
}

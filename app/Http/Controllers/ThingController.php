<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Thing;
use App\models\Post;
use App\Http\Controllers\Lista;
use App\models\PropertyRequest;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeEdit(Request $request)
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
        
        Thing::where('thing_id', request('idThing'))->update(['thing_name'=>request('nombre'),'description'=>request('descripcion'),'photo'=>$foto,'status'=>request('estado'),'category_id'=>request('categoria')]);


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
        //thing details
        $things = Thing::where('thing_id', $idThing)
        ->join('post', 'thing.post_id', '=', 'post.id')
        ->join('users', 'post.user_id', '=', 'users.id')->get();
        $thing_status = Lista::THING_STATUS;
        $thing_state = Lista::THING_STATE;
        //request details
        $propertyRequest = PropertyRequest::where('request_state', '!=', 4)
        ->join('thing', 'property_request.thing_id', '=', 'thing.thing_id')
        ->join('post', 'thing.post_id', '=', 'post.id')
        ->join( 'users as usr', DB::raw( 'property_request.user_id' ), '=', DB::raw( 'usr.id' ) )
        ->select( 'property_request.*','thing.*', DB::raw( 'usr.name, usr.id as usrId') )
        ->where('property_request.thing_id', $idThing)
        ->get();
        $REQUEST_STATE_2=Lista::REQUEST_STATE_2;
        //returns
        return view('ver_articulo', compact('idThing','things','thing_status','thing_state','propertyRequest','REQUEST_STATE_2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idThing, $idPost)
    {
        $category = Category::where('category_status', 1)->get();
        $things = Thing::where('thing_id', $idThing)->get();
        return view('editar_articulo', compact('idThing', 'idPost','things','category'));
        
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
     * Elimina los articulos y posteriormente Elimina el post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($idPost)
    {
        $things = Thing::where('post_id', $idPost)->get();

        if($things->isEmpty()){
            //borrar solo post
            toast('Añade primero algun artículo','error');
            return redirect()->route('editar_post', $idPost);
        }else{
            foreach ($things as $thing) {
                //mandar notificaciones
                Thing::where('thing_id', $thing->thing_id)->update(['thing_state'=>4]);
            }
            Post::where('id', $idPost)->update(['post_state'=>4]);
            toast('Se realizo tu publicación','info');
            return redirect()->route('publicaciones_propias');
        }
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
        		$thingDelet = Thing::find($thing->thing_id);
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

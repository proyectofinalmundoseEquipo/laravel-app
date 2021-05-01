<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session; // sesion

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::paginate(); // 5= registros por pagina

        return view('post.index' , $data);
    }

    public function search(Request $request)
    {
       // $data = $request->all();
       $data = $request->input('search');
       $query = Post::select()
       ->join('categories as cat','posts.category_id', '=', 'cat.id')
       ->Where ('title','like',"%$data%")
       ->orWhere ('author','like',"%$data%")
       ->orWhere ('cat.name','like',"%$data%")
       ->get();
       return view('Post.index')->with(['posts' => $query]);
    }

    // enviando datos a la api
    public function list()
    {
        $data = Post::all(); // 5= registros por pagina
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create')->with(["categories"=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $data = $request->all();
        var_dump($data);
        die(); para demostrar que la info viaja*/
        $data = $request->except('_token');
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('uploads','public');
            // desde la consola
            // php artisan storage:link
            // esto hace que se haga publica la cargpeta uploads
        }
        Post::insert($data);
        Session::flash('alert-success', "Se ha Creado el Post con éxito! {$data['title']}");
        return  Redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Post::findOrFail($id);
        $categories = Category::all();
        return view("post.show")->with(["post" => $data, "categories" => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // return view('post.edit');
       $data = Post::findOrFail($id);
        $categories = Category::all();

        return view("post.edit")->with(["post" => $data, "categories" => $categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token','_method');
        if ($request->hasFile('image')) {
               $post = Post::findOrFail($id);
               Storage::delete("public/$post->image"); // aqui si utiliza doble comillas (borra la imagen vieja)
               $data['image'] = $request->file('image')->store('uploads','public');
        }
        Post::where('id','=', $id)->update($data);
        Session::flash('alert-success', "Se ha Actulizado el Post con éxito! {$data['title']}");
        return  Redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::findOrFail($id);
        Storage::delete("public/$post->image"); // aqui si utiliza doble comillas (borra la imagen vieja)

        Post::destroy($id);
        return  Redirect()->route('post.index');
    }
}

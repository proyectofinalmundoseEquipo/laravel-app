<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // sesion


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::paginate(); // 5= registros por pagina
        return view('Category.index' , $data);
    }

    public function list()
    {
        $data = Category::all(); // 5= registros por pagina
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
        return view('Category.create');
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token'); // excluye al campo token para la inserción
       Category::insert($data);
       Session::flash('alert-success', "Se ha Creado la Categorías con éxito! {$data['name']}");
        return  Redirect()->route('categories.index');



    }


    public function save(Request $request)
    {
        //return response($request);
       $category = new Category();
       $category->name = $request->name;
       $category->description = $request->description;
       $category->save();
       return response()->json("la información se guardo con exito", 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Category::findOrFail($id);
        return view("Category.show")->with(["categories" => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view("Category.edit")->with(["categories" => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token','_method');
        Category::where('id','=', $id)->update($data);
        Session::flash('alert-success', "Se ha Actualizado la Categoría con éxito! {$data['name']}");
        return  Redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Products;
use App\Cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function crear(){
        return view('products.crear');
    }


    public function index()
    {
        $productos=Products::with('cursos')->orderBy('id','DESC')->paginate(3);

        //dd($productos);

        return view('products.index',compact('productos'));
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

      $data= $request->validate([

        'nombre_producto'=>'required',
        'ap_producto'=>'required',
        'nombre_curso'=>'required',
        'descripcion_curso'=>'required'
      ],[
          'nombre_producto.required'=>'El campo nombre es obligatorio'
      ]);

     DB::transaction(function () use ($data, $request) {
         $producto=Products::create([
            'nombre_producto'=>$data['nombre_producto'],
            'ap_producto'=>$data['ap_producto']
         ]);

        //se inserta ahora lo de cursos
         //se utiliza la relacion de una vexx
        foreach($request->nombre_curso as $item=>$v)
           {
                $producto->cursos()->create([
                'nombre_curso'=>$request->nombre_curso[$item],
                'descripcion_curso'=>$request->descripcion_curso[$item]
            ]);

           }
     });
       return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        $products = Products::with('cursos')->find($products->id);

        return view('products.editar', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products, $id)
    {

        $request->validate([

            'nombre_producto'=>'required',
            'ap_producto'=>'required',
            'nombre_curso'=>'required',
            'descripcion_curso'=>'required'
          ],[
              'nombre_producto.required'=>'El campo nombre es obligatorio'
          ]);



        DB::transaction(function () use ($request, $id) {
            $producto = Products::with('cursos')->find($id);

            //dd($producto->cursos);

            $producto->nombre_producto=$request->get('nombre_producto');
            $producto->ap_producto=$request->get('ap_producto');
            $producto->save();

            $producto->cursos()->delete($id);
            //se inserta ahora lo de cursos
            //se utiliza la relacion de una vexx
           foreach($request->nombre_curso as $item=>$v)
              {

                  //dd($item);
                $producto->cursos()->create([
                    'nombre_curso'=>$request->nombre_curso[$item],
                    'descripcion_curso'=>$request->descripcion_curso[$item]
                ]);

              }

        });


        return redirect()->route('index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        $producto = Products::find($products->id)->delete();
        return redirect()->route('index');
    }
}

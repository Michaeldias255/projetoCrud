<?php
namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProdutoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) : JsonResponse
    {
        if($request->has(key: 'nome')){
            $nome = strtolower($request->nome);
            $query = Produto::query();
            $query->where(column: 'nome', operator: 'LIKE', value: "{$nome}%")->get();
            $produtos = $query;
            return response()->json($produtos);
        }

         $produtos = Produto::all();
         return response()-> json($produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function create()
    {
        return view();
    }
    */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $request->validate([
            'codigo' => 'required',
            'nome' => 'required',
            'categoria' =>'required',
            'preco' => 'required',
            'status' => 'required',
        ]);
         // Validate the request...
         */

         $produto = new Produto();

         $produto->codigo = $request->codigo;
         $produto->nome = $request->nome;
         $produto->categoria = $request->categoria;
         $produto->preco = $request->preco;
         $produto->status = $request->status;
 
         $produto->save();

         return response()->json([
            'data' => [
                'msg' => 'Produto registrado com sucesso!'
            ]
        ],201);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        return response()->json([
            'data' => [
                $produto
            ]
        ],200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */

    /*
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }
    */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'codigo' => 'required',
            'nome' => 'required',
            'categoria' =>'required',
            'preco' => 'required',
            'status' => 'required',
        ]);
         // Validate the request...

         $produto = Produto::find($id);

         $produto->codigo = $request->codigo;
         $produto->nome = $request->nome;
         $produto->categoria = $request->categoria;
         $produto->preco = $request->preco;
         $produto->status = $request->status;
 
        $produto->save();

        return response()->json([
            'data' => [
                'msg' => 'Produto atualizado com sucesso!'
            ]
        ],201);
    }
       
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return response()->json([
            'data' => [
                'msg' => 'Produto deletado com sucesso!'
            ]
        ],200);
    }
}

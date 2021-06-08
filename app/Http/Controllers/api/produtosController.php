<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\produtos;
use Illuminate\Http\Request;

class produtosController extends Controller
{
    private $produtos;

    public function __construct(produtos $produtos)
    {
        $this->produtos=$produtos;
    }

    public function index()
    {
        $produtos = $this->produtos->all();
        return Response()->json($produtos);
    }

    public function show($id)
    {
        $produtos = $this->produtos->find($id);
        return Response()->json($produtos);
    }

    public function save(Request $request)
    {
        $data = $request->all();
        $produtos = $this->produtos->create($data);
        return Response()->json($produtos);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $produtos = $this->produtos->find($data['id']);
        $produtos->update($data);
        return Response()->json($produtos);
    }

    public function destroy($id)
    {
        $produtos = $this->produtos->find($id);
        $produtos->delete();

        return Response()->json(['data'=>['msg'=>'Produto removido com sucesso']]);
    }
}

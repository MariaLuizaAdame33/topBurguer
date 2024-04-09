<?php

namespace App\Http\Controllers;


use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    
    public function cadastro()
    {
        $clientes = Cliente::all();

        $produtosComImagem = $clientes->map(function ($clientes) {

            return [
                'imagem' => asset('storage/' . $clientes->imagem),
                'nome' => $clientes->nome,
                'celular' => $clientes->celular,
                'endereco' => $clientes->endereco,
                'email' => $clientes->email,
                'password' => $clientes->password,
                

            ];
        });


        return response()->json($produtosComImagem);
    }

    public function store(Request $request){
        $clienteData = $request->all();

        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $nomeImagem = time().'.'.$imagem->getClientOriginalExtension();
            $caminhoImagem = $imagem->storeAs('imagens/clientes', $nomeImagem, 'public');
            $clienteData['imagem'] = $caminhoImagem;
        }
        
        $clientes = Cliente::create($clienteData);
        return response()->json(['clientes'=>$clientes]);
    }
}
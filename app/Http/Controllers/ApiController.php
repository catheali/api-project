<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function getAllUsuarios( ) 
    {
        $usuarios = Usuario::get()->toJson(JSON_PRETTY_PRINT);
        return response($usuarios, 200);
    }
    public function createUsuario(Request $request)
    {
        $usuario = new Usuario;
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->save();
        
        return response()->json([
            "message" => "Usuario criado com sucesso"
        ], 201);

    }
    public function getUsuario($id)
    {
        if(Usuario::where('id', $id)->exists()){
            $usuario = Usuario::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($usuario, 200);
        }else {
            return response()->json([
                "message" => "Usuario não encontrado"
            ],404);
        }
    }
    public function updateUsuario(Request $request, $id)
    {
        if(Usuario::where('id', $id)->exists()){
            $usuario = Usuario::find($id);
            $usuario->nome = is_null($request->nome) ? $usuario->nome : $request->nome;
            $usuario->email = is_null($request->email) ? $usuario->email : $request->email;
            $usuario->save();
            return response()->json([
                "message" => "Usuario atualizado com sucesso"
            ], 200);
        } else {
            return response()->json([
                "message"=> "Usuario não encontrado"
            ], 404);
        }
    }
    public function deleteUsuario($id)
    {
        if(Usuario::where('id', $id)){
            $usuario = Usuario::find($id);
            $usuario->delete();

            return response()->json([
                "message"=> "Usuario excluido com sucesso"
            ], 202);
        } else {
            return response()->json([
                "message" => "Usuario não encontrado"
            ], 404);
        }
    }
}

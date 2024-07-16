<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{

    public function index(){
        return Cliente::all();
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $cliente = Cliente::where('email', $request->email)->first();

        if ($cliente && Hash::check($request->password, $cliente->password)) {
            return response()->json([
                'message' => 'Acceso permitido',
                'cliente' => $cliente,
            ],201);
        }

        return response()->json(['message' => 'Acceso denegado'], 401);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clientes',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $cliente = Cliente::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        return response()->json(['message' => 'Cliente registrado exitosamente', 'cliente' => $cliente], 201);
    }
}

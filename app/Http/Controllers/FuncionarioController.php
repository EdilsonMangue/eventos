<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $funcionarios = Funcionario::orderBy('id', 'DESC')->paginate(15);
        return view('funcionario.index', ['funcionarios' =>$funcionarios]);
    }

    public function create()
    {
        return view('funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->permission = "Administrador";
            $user->password =  Hash::make($request->password);
    
            $user->save();
    
            $funcionario = new Funcionario();
    
            $funcionario->name = $request->name;
            $funcionario->email = $request->email;
            $funcionario->contacto = $request->contacto;
            $funcionario->nr_bi = $request->nr_bi;
            $funcionario->user_id = $user->id;
           
            $funcionario->save();
    
            return redirect()->route('funcionario.index');
        } catch (\Throwable $th) {
           return $th->getMessage();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $funcionario = Funcionario::find($id);

            return view('funcionario.editar', ['funcionario' => $funcionario]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $funcionario = Funcionario::find($id);
            $funcionario->name = $request->name;
            $funcionario->email = $request->email;
            $funcionario->contacto = $request->contacto;
            $funcionario->nr_bi = $request->nr_bi;
            $funcionario->update();

            return redirect()->route('funcionario.index');
        } catch (\Throwable $th) {
           return $th->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request )
    {
        try {
            $funcionario = Funcionario::find($request->id);
            $funcionario->delete();

            return redirect()->route('funcionario.index');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}

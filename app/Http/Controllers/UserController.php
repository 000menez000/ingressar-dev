<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private array $rules = [
        "role_id" => "required|integer|exists:roles,role_id",
        "name" => "required|string|max:255",
        "username" => "required|string|max:50|unique:users,username",
        "email" => "required|email|unique:users,email",
        "password" => "required|string|min:8|confirmed",
    ];

    private array $messages = [
        "role_id.required" => "O role_id é obrigatório.",
        "role_id.exists" => "O role_id informado não existe.",
        "name.required" => "O nome é obrigatório.",
        "username.unique" => "O nome de usuário já está em uso.",
        "email.required" => "O email é obrigatório.",
        "email.unique" => "O email já está em uso.",
        "password.confirmed" => "A confirmação de senha não corresponde.",
    ];

    protected $with = ['roles'];

    public function index()
    {
        $users = User::with('roles')->get();

        return response()->json($users);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate($this->rules, $this->messages);

        User::create($request->all());

        return $this->redirectMoviesIndex('Usuário criado com sucesso.');
    }

    public function show(User $user)
    {
        return $user;
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        $request->validate($this->rules, $this->messages);

        $user->update($request->all());

        return $this->redirectMoviesIndex('Usuário atualizado com sucesso.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->redirectMoviesIndex('Usuário deletado com sucesso.');
    }   
}

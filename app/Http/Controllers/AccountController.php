<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function index(){
        $users = User::all();
        return view("account.index",compact("users"));
    }

//     public function destroy(User $user){
//         User::destroy($user->id);
//         $users = User::all();
//         return view("account.index",compact("users"));
//     }
    public function destroy($id)
    {
        // Encuentra el usuario por su ID
        $user = User::findOrFail($id);

        // Verifica si el usuario no es administrador (opcional, si tienes lógica de permisos)
        if ($user->is_admin != 1) {
            // Elimina el usuario
            $user->delete();

            // Redirige de vuelta con un mensaje de éxito o realiza alguna acción deseada
            return redirect()->route('account.index')->with('success', 'User deleted successfully');
        } else {
            // Redirige con un mensaje de error si intentas eliminar un administrador
            return redirect()->route('account.index')->with('error', 'Cannot delete an admin user');
        }
    }
}

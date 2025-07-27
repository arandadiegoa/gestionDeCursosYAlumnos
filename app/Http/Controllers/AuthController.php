<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class AuthController extends Controller
{
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register'); //Formulario de registro
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
          'name' =>'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password'=> 'required|string|min:8|confirmed',
          'rol' => ['required', Rule::in(['admin','coordinador'])]
        ]);

        //Crear usuario
        $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password), //Hash la pass
          'rol' => $request->rol, // Guardar el rol seleccionado
        ]);

        Auth::login($user);
        
          // Redirección basada en el rol del usuario
        if ($user->rol === 'admin') {
            // Si es admin, redirigir a un dashboard de admin
            return redirect('/admin/home')->with('success', '¡Registro Exitoso!');
        } elseif ($user->rol === 'coordinador') {
            // Si es coordinador, redirigir a su dashboard
            return redirect('/coordinador/home')->with('success', '¡Registro Exitoso!');
        }

    }

    public function showFormLogin()
    {
      return view('auth.login');
    }

    public function login(Request $request)
    {
      $credentials = $request->validate([ //Validar credenciales
        'email' => 'required|email',
        'password' => 'required',
      ]);

      //Validacion
      if(Auth::attempt($credentials, $request->remember)){//si son correctas las credenciales
        $request->session()->regenerate(); //Protege la sesión regenerando el ID.
        
            $user = Auth::user();//retorna el usuario logueado

             // Redirección basada en el rol del usuario que inicia sesión
            if ($user->rol === 'admin') {
                return redirect()->route('admin.home');
            } elseif ($user->rol === 'coordinador') {
                return redirect()->route('coordinador.home');
            }

            return redirect()->route('home');

      }

      return back()->withErrors([
        'email' => 'Las credenciales son incorrectas',
      ]);
    }

    public function logout(Request $request)
    {
      Auth::logout();

      $request->session()->invalidate();
      $request->session()->regenerate();

      return redirect('/');
    }

}

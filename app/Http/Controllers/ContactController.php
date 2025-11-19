<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Aquí puedes enviar el mail, guardar en la base, etc.
        // Ejemplo: solo redirige con mensaje de éxito
        return back()->with('success', '¡Tu consulta fue enviada correctamente!');
    }
}
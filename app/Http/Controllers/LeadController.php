<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\LeadNotification;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'nullable|string',
            'vehicle_id' => 'nullable|exists:vehicles,id',
        ]);

        $lead = Lead::create($validated);

        // Enviar email
        try {
            Mail::to('fishertonrodados@hotmail.com')->send(new LeadNotification($lead));
        } catch (\Exception $e) {
            Log::error('Error enviando email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', '¡Mensaje enviado correctamente! Nos pondremos en contacto pronto.');
    }
}

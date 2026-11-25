<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UploadDiagnosticController extends Controller
{
    public function __invoke(Request $request)
    {
        abort_unless($request->user()?->isAdmin(), 403);

        $data = $request->validate([
            'event' => ['required', 'in:start,progress,finish,error,cancel'],
            'field' => ['nullable', 'string', 'max:120'],
            'size' => ['nullable', 'integer', 'min:0'],
            'mime' => ['nullable', 'string', 'max:120'],
            'progress' => ['nullable', 'integer', 'min:0', 'max:100'],
            'occurred_at' => ['required', 'date'],
        ]);

        Log::info('Image upload diagnostic', [
            'user_id' => $request->user()->id,
            ...$data,
        ]);

        return response()->noContent();
    }
}

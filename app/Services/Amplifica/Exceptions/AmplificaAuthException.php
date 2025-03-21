<?php


namespace App\Services\Amplifica\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

class AmplificaAuthException extends Exception
{
    public function __construct($message, $code = 500)
    {
        parent::__construct($message, $code);
    }

    public function report(): void
    {
        Log::error('Error en endpoint de autentificacion de Amplifica ' . $this->getMessage());
    }

    public function render($request)
    {
        return response()->json(['error' => 'Error de autenticación con Amplifica: ' . $this->message], $this->code);
    }
}

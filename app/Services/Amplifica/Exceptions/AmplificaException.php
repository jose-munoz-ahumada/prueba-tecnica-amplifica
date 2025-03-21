<?php


namespace App\Services\Amplifica\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class AmplificaException extends Exception
{
    public function __construct($message = 'Error en la API de Amplifica', $code = 500)
    {
        parent::__construct($message, $code);
    }

    public function report(): void
    {
        Log::error('Error en la api de Amplifica ' . $this->getMessage());
    }

    public function render($request)
    {
        return response()->json(['error' => $this->message], $this->code);
    }
}

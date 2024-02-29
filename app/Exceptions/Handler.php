<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // public function render($request, Throwable $exception)
    // {
    //     // Personnaliser la page pour les erreurs 404
    //     if ($exception instanceof NotFoundHttpException || $exception instanceof ModelNotFoundException) {
    //         return response()->view('errors.errors', [], 404);
    //     }

    //     // Personnaliser la page pour les erreurs 403
    //     if ($exception instanceof AuthorizationException) {
    //         return response()->view('errors.errors', [], 403);
    //     }

    //     // Personnaliser la page pour les erreurs 500
    //     if ($exception instanceof \ErrorException) {
    //         return response()->view('errors.errors', [], 500);
    //     }

    //     // Pour toutes les autres erreurs, rediriger vers une page d'erreur générale
    //     // return response()->view('errors.errors', ['exception' => $exception], $exception->getStatusCode() ?? 500);
    // }
}

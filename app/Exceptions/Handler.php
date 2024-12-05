<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
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
            // Optional: Log exceptions or notify developers.
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    // public function render($request, Throwable $exception)
    // {
    //     if ($request->expectsJson()) {
    //         return $this->handleApiException($request, $exception);
    //     }

    //     return parent::render($request, $exception);
    // }

    // /**
    //  * Handle API-specific exception formatting.
    //  *
    //  * @param \Illuminate\Http\Request $request
    //  * @param \Throwable $exception
    //  * @return JsonResponse
    //  */
    // protected function handleApiException($request, Throwable $exception): JsonResponse
    // {
    //     $statusCode = $this->getStatusCode($exception);
    //     $message = $this->getFriendlyMessage($exception);

    //     // Use SendResponse helper to format the API response
    //     return SendResponse($statusCode, $message);
    // }

    // /**
    //  * Get the appropriate status code for the exception.
    //  *
    //  * @param Throwable $exception
    //  * @return int
    //  */
    // protected function getStatusCode(Throwable $exception): int
    // {
    //     if ($exception instanceof ValidationException) {
    //         return 422;
    //     }

    //     if ($exception instanceof AuthenticationException) {
    //         return 401;
    //     }

    //     if ($exception instanceof AuthorizationException) {
    //         return 403;
    //     }

    //     if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {
    //         return 404;
    //     }

    //     if ($exception instanceof HttpException) {
    //         return $exception->getStatusCode();
    //     }

    //     // return 500;
    // }

    // /**
    //  * Get a user-friendly error message for the exception.
    //  *
    //  * @param Throwable $exception
    //  * @return string
    //  */
    // protected function getFriendlyMessage(Throwable $exception): string
    // {
    //     if ($exception instanceof ValidationException) {
    //         return 'Validation error. Please check your input.';
    //     }

    //     if ($exception instanceof AuthenticationException) {
    //         return 'Unauthenticated. Please log in.';
    //     }

    //     if ($exception instanceof AuthorizationException) {
    //         return 'Unauthorized action.';
    //     }

    //     if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {
    //         return 'The requested resource was not found.';
    //     }

    //     return 'An unexpected error occurred. Please try again later.';
    // }
}

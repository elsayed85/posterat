<?php

namespace App\Exceptions;

use Error;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {

        if ($request->wantsJson()) {
            return $this->handleException($request, $e);
        }
        return parent::render($request, $e);
    }

    public function handleException($request, Throwable $e)
    {

        if ($e instanceof ValidationException) {
            return failed($e->getMessage(), [
                'errors' => $e->errors(),
                'type' => 'validation'
            ],  Response::HTTP_FORBIDDEN);
        } elseif ($e instanceof AuthorizationException) {
            return failed($e->getMessage(), [
                'error_code' => Response::HTTP_UNAUTHORIZED,
                'type' => 'authorization'
            ],  Response::HTTP_UNAUTHORIZED);
        } elseif ($e instanceof TokenMismatchException) {
            return failed($e->getMessage(), [
                'error_code' => Response::HTTP_FORBIDDEN,
                'type' => 'access_denied_token_mismatch',
            ],  Response::HTTP_FORBIDDEN);
        } elseif ($e instanceof AccessDeniedHttpException) {
            return failed($e->getMessage(), [
                'error_code' => Response::HTTP_FORBIDDEN,
                'type' => 'access_denied',
            ],  Response::HTTP_FORBIDDEN);
        } elseif ($e instanceof MethodNotAllowedHttpException) {
            return failed($e->getMessage(), [
                'error_code' => Response::HTTP_METHOD_NOT_ALLOWED,
                'type' => 'method_not_allowed',
            ],  Response::HTTP_METHOD_NOT_ALLOWED);
        } elseif ($e instanceof AuthenticationException) {
            return failed($e->getMessage(), [
                'error_code' => Response::HTTP_NETWORK_AUTHENTICATION_REQUIRED,
                'type' => 'authentication'
            ],  Response::HTTP_NETWORK_AUTHENTICATION_REQUIRED);
        } elseif ($e instanceof ModelNotFoundException) {
            return failed($e->getMessage(), [
                'error_code' => Response::HTTP_NOT_FOUND,
                'type' => 'model_not_found',
                'message' => 'Entry for ' . str_replace('App\\', '', $e->getModel()) . ' not found',
            ],  Response::HTTP_NOT_FOUND);
        } else {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }
}

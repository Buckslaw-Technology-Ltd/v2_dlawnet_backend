<?php

namespace Modules\Core\App\Traits;

use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

trait ResponseTrait
{
    public function successResponse(string $message, mixed $data = [], int $status = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "success" => true,
            "message" => $message,
            "data" => $data,
        ], $status);
    }

    public function resourceCreated(string $message = "Resource created", int $status = 201): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "success" => true,
            "message" => $message,
        ], $status);
    }

    public function handleException(\Exception $exception): \Illuminate\Http\JsonResponse
    {
        // Determine the type of exception and call the appropriate method
        if ($exception instanceof ValidationException) {
            return $this->handleValidationException($exception);
        }

        if ($exception instanceof UnauthorizedHttpException) {
            return $this->handleUnauthorizedException($exception);
        }

        if ($exception instanceof QueryException) {
            return $this->handleQueryException($exception);
        }

        // General exception handling
        return $this->errorResponse(
            $this->formatExceptionMessage($exception),
            "An error occurred",
            $this->determineStatusCode($exception)
        );
    }

    protected function handleValidationException(ValidationException $exception): \Illuminate\Http\JsonResponse
    {
        // Customize the validation error response
        return $this->errorResponse(
            $exception->errors(),
            "Validation failed",
            422
        );
    }

    public function errorResponse(mixed $errors, string $message = "Something went wrong", int $status = 500): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "success" => false,
            "message" => $message,
            "errors" => $errors,
        ], $status);
    }

    protected function handleUnauthorizedException(UnauthorizedHttpException $exception): \Illuminate\Http\JsonResponse
    {
        // Customize the unauthorized error response
        return $this->errorResponse(
            null,
            "Unauthorized access",
            401
        );
    }

    protected function handleQueryException(QueryException $exception): \Illuminate\Http\JsonResponse
    {
        $errorMessage = $exception->getMessage();

        // Check for specific database errors like duplicate entries
        if (str_contains($errorMessage, 'Duplicate entry')) {
            return $this->errorResponse(
                null,
                "Duplicate entry detected. Some entries already exist.",
                409
            );
        }

        // General query exception response
        return $this->errorResponse(
            $this->formatExceptionMessage($exception),
            "Database query error",
            500
        );
    }

    protected function formatExceptionMessage(\Exception $exception): string
    {
        // Extract a user-friendly message from the exception
        return $exception->getMessage();
    }

    protected function determineStatusCode(\Exception $exception): int
    {
        // Map specific exceptions to appropriate HTTP status codes
        if ($exception instanceof ValidationException) {
            return 422;
        }

        if ($exception instanceof UnauthorizedHttpException) {
            return 401;
        }

        if ($exception instanceof QueryException) {
            return 500; // Could be more specific depending on the error
        }

        // Default status code for general exceptions
        return 500;
    }

}

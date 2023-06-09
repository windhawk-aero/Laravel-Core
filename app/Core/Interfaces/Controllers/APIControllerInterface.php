<?php

namespace App\Core\Interfaces\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

interface APIControllerInterface
{
    public function index(Request $request): JsonResponse;

    public function store(Request $request): JsonResponse;

    public function show($id, Request $request): JsonResponse;

    public function update($id, Request $request): JsonResponse;

    public function destroy($id, Request $request): JsonResponse;

    public function sendResponse(JsonResource $result, string $message): JsonResponse;

    public function sendError(JsonResource $message, $code = 404): JsonResponse;
}

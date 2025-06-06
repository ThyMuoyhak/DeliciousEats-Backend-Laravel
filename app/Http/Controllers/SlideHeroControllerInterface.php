<?php

namespace App\Http\Controllers\Interfaces;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface SlideHeroControllerInterface
{
    public function index(): JsonResponse;
    public function show($id): JsonResponse;
    public function store(Request $request): JsonResponse;
    public function update(Request $request, $id): JsonResponse;
    public function destroy($id): JsonResponse;
}
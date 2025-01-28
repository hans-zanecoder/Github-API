<?php
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

Route::get('/pull-requests', function (): JsonResponse {
    $repo = config('github.repository', 'zaneCoder/mortdash');
    
    return Http::withToken(config('github.api_token'))
        ->get("https://api.github.com/repos/{$repo}/pulls")
        ->json();
});

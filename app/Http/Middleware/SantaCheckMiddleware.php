<?php

namespace App\Http\Middleware;

use App\Models\GamePool;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SantaCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('players')->user();
        $isPlayerActive = GamePool::where('player_id', $user->id)->exists();

        if ($isPlayerActive) {
            return redirect()->route('santa.end');
        }
        return $next($request);
    }
}

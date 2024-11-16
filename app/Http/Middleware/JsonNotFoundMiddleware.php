<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use TypeError;

class JsonNotFoundMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            return $next($request);
        } catch (NotFoundHttpException $e) {
            return response()->json(['message' => 'Risorsa non trovata'], 404);
        }
        catch (TypeError $e){
            return response()->json(['message' => 'Errore di tipo di dato'], 400);
        }
        catch (\Throwable $e) {
            return response()->json(['message' => 'Errore generico'], 500);
        }
    }
}

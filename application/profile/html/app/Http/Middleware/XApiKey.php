<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Client;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class XApiKey
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param string $header
     *
     * @return Response
     */
    public function handle(Request $request, Closure $next, string $header = 'X-API-KEY'): Response
    {
        $id = $request->header($header);
        abort_if($id === null, 401, 'Unauthorized.');

        $model = $this->getModel($id);
        abort_if(!$model instanceof Client, 401, 'Unauthorized.');

        Auth::login($model);

        return $next($request);
    }

    /**
     * @param string $id
     *
     * @return Client|null
     */
    protected function getModel(string $id): ?Client
    {
        return Client::query()
            ->where([
                'id' => $id,
            ])
            ->first();
    }
}

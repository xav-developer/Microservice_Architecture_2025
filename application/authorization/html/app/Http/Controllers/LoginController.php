<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\MeResource;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OA;

class LoginController extends Controller
{
    /**
     * @param LoginRequest $request
     *
     * @return MeResource
     */
    #[
        OA\Post(
            path: '/login',
            requestBody: new OA\RequestBody(
                required: true,
                content: new OA\JsonContent(
                    ref: '#/components/schemas/login-request'
                )
            ),
            tags: [
                'Client',
            ],
            responses: [
                new OA\Response(
                    response: 200,
                    description: 'OK',
                    content: new OA\JsonContent(
                        properties: [
                            new OA\Property(
                                property: 'data',
                                ref: '#/components/schemas/me-resource'
                            ),
                        ]
                    )
                ),
            ]
        )
    ]
    public function __invoke(LoginRequest $request): MeResource
    {
        if ($request->user()) {
            return MeResource::make(
                $request->user()
            );
        }

        if (
            Auth::attempt(
                $request
                    ->safe()
                    ->only([
                        'username',
                        'password',
                    ]))
        ) {
            $model = Client::query()
                ->where([
                    'username' => $request
                        ->safe()
                        ->input('username'),
                ])
                ->first();

            Auth::login($model);

            return MeResource::make($model);
        }

        abort(401, 'Unauthorized.');
    }
}

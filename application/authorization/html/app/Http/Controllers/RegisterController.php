<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\MeResource;
use App\Models\Client;
use OpenApi\Attributes as OA;

class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     *
     * @return MeResource
     */
    #[
        OA\Post(
            path: '/register',
            requestBody: new OA\RequestBody(
                required: true,
                content: new OA\JsonContent(
                    ref: '#/components/schemas/register-request'
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
    public function __invoke(RegisterRequest $request): MeResource
    {
        $model = new Client()
            ->fill(
                $request
                    ->safe()
                    ->toArray()
            );

        $model
            ->save();

        return MeResource::make($model);
    }
}

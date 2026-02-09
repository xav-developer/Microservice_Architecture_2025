<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\MeResource;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class MeController extends Controller
{
    /**
     * @param Request $request
     *
     * @return MeResource
     */
    #[
        OA\Get(
            path: '/me',
            security: [
                [
                    'apiKey' => [],
                ],
            ],
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
    public function __invoke(Request $request): MeResource
    {
        return MeResource::make($request->user());
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OA;

class LogoutController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    #[
        OA\Post(
            path: '/logout',
            tags: [
                'Client',
            ],
            responses: [
                new OA\Response(
                    response: 204,
                    description: 'No content',
                    content: new OA\JsonContent(
                        properties: [
                            new OA\Property(
                                property: 'data',
                                ref: '#/components/responses/204'
                            ),
                        ]
                    )
                ),
            ]
        )
    ]
    public function __invoke(Request $request): Response
    {
        Auth::logout();

        $request
            ->session()
            ->invalidate();

        $request
            ->session()
            ->regenerateToken();

        return response()
            ->noContent();
    }
}

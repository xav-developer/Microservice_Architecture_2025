<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;
use Override;

#[
    OA\Schema(
        schema: 'me-resource',
        properties: [
            new OA\Property(
                property: 'id',
                ref: '#/components/schemas/uuid'
            ),

            new OA\Property(
                property: 'username',
                ref: '#/components/schemas/username'
            ),

            new OA\Property(
                property: 'first_name',
                ref: '#/components/schemas/first_name'
            ),
            new OA\Property(
                property: 'last_name',
                ref: '#/components/schemas/last_name'
            ),

            new OA\Property(
                property: 'email',
                ref: '#/components/schemas/email'
            ),
            new OA\Property(
                property: 'phone',
                ref: '#/components/schemas/phone'
            ),
        ]
    ),
]
class MeResource extends AbstractJsonResource
{
    /**
     * @var Client
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[Override]
    public function toArray(Request $request): array
    {
        return $this
            ->resource
            ->only([
                'id',

                'username',

                'first_name',
                'last_name',

                'email',
                'phone',
            ]);
    }

    /**
     * @param Request $request
     * @param JsonResponse $response
     */
    #[Override]
    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->header('X-API-KEY', $this->resource->getAuthIdentifier());
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[
    OA\OpenApi(
        openapi: '3.1.0',
        info: new OA\Info(
            version: '1.0.0',
            title: 'Profile',
        ),
    ),
    OA\Components(
        schemas: [
            new OA\Schema(
                schema: 'id',
                type: 'integer',
                example: 0
            ),
            new OA\Schema(
                schema: 'uuid',
                type: 'string',
                example: '00000000-0000-0000-0000-000000000000'
            ),
            new OA\Schema(
                schema: 'boolean',
                type: 'integer',
                enum: [
                    0,
                    1,
                ],
                example: 0
            ),
            new OA\Schema(
                schema: 'timestamp',
                type: 'integer',
                example: 0000000000
            ),
            new OA\Schema(
                schema: 'date',
                type: 'string',
                example: '2025-01-01'
            ),
            new OA\Schema(
                schema: 'time',
                type: 'string',
                example: '00:00:00'
            ),
            new OA\Schema(
                schema: 'datetime',
                type: 'string',
                example: '2025-01-01T00:00:00'
            ),
            new OA\Schema(
                schema: 'phone',
                type: 'integer',
                example: 70000000000
            ),
            new OA\Schema(
                schema: 'email',
                type: 'string',
                example: 'john@smith.com'
            ),
            new OA\Schema(
                schema: 'first_name',
                type: 'string',
                example: 'John'
            ),
            new OA\Schema(
                schema: 'last_name',
                type: 'string',
                example: 'Smith'
            ),
            new OA\Schema(
                schema: 'middle_name',
                type: 'string',
                example: null
            ),
            new OA\Schema(
                schema: 'username',
                type: 'string',
                example: 'username'
            ),
            new OA\Schema(
                schema: 'password',
                type: 'string',
                example: 'password'
            ),
            new OA\Schema(
                schema: 'password_confirmation',
                type: 'string',
                example: 'password'
            ),
        ],
        responses: [
            new OA\Response(
                response: 204,
                description: 'No content',
                content: new OA\JsonContent()
            ),
        ],
        parameters: []
    ),
]
abstract class Controller
{
}

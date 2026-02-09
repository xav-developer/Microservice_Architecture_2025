<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use OpenApi\Attributes as OA;

#[
    OA\Schema(
        schema: 'register-request',
        properties: [
            new OA\Property(
                property: 'username',
                ref: '#/components/schemas/username'
            ),

            new OA\Property(
                property: 'password',
                ref: '#/components/schemas/password'
            ),
            new OA\Property(
                property: 'password_confirmation',
                ref: '#/components/schemas/password_confirmation'
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
                ref: '#/components/schemas/phone',
            ),
        ]
    ),
]
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => [
                'required',
                'string',
                Rule::unique(Client::class),
            ],
            'password' => [
                'required',
                'confirmed',
                Password::default(),
            ],

            'first_name' => [
                'required',
                'string',
            ],
            'last_name' => [
                'required',
                'string',
            ],

            'email' => [
                'required',
                'email',
            ],
            'phone' => [
                'required',
                'integer',
            ],
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

class SwaggerController
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('oas/swagger', [
            'urls' => json_encode([
                [
                    'url' => route('oas.api'),
                    'name' => '1.0.0',
                ],
            ], JSON_UNESCAPED_SLASHES),
        ]);
    }
}

<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table): void {
            $table->uuid('id');
            $table->timestamps();

            $table->string('username');
            $table->string('password');

            $table->string('first_name');
            $table->string('last_name');

            $table->string('email');
            $table->unsignedBigInteger('phone');

            $table->unique(['username']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

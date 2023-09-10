<?php

use App\Enums\UserStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('status')->default(UserStatus::IsActive->value);
            $table->string('is_root')->default(0);
            $table->string('provider_id')->nullable();
            $table->string('auth_type')->nullable();
            $table->string('position')->nullable();
            $table->string('sex')->nullable();
            $table->timestamp('date_of_birth')->nullable();
            $table->text('present')->nullable();
            $table->integer('view')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

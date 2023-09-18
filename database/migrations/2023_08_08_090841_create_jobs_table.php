<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('experience');
            $table->string('position');
            $table->bigInteger('vacancy');
            $table->string('deadline_for_filing');
            $table->string('type');
            $table->bigInteger('min_salary');
            $table->bigInteger('max_salary');
            $table->string('status')->default('hide');
            $table->softDeletes();
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

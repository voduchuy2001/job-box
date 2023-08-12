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
            $table->string('qualification');
            $table->string('experience');
            $table->string('industry');
            $table->string('vacancy');
            $table->string('status');
            $table->date('deadline_for_filing');
            $table->foreignId('user_id');
            $table->foreignId('job_category_id');
            $table->foreignId('job_type_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

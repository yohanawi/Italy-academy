<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('thumbnail')->nullable();
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->string('author_name')->nullable();
            $table->string('author_profile_photo')->nullable();
            $table->string('author_position')->nullable();
            $table->date('published_date')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->boolean('is_popular')->default(false);
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

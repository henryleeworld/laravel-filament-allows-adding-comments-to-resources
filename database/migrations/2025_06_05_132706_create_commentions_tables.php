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
        Schema::create(config('commentions.tables.comments', 'comments'), function (Blueprint $table) {
            $table->id();
            $table->morphs('author');
            $table->morphs('commentable');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('commentions.tables.comments', 'comments'));
    }
};

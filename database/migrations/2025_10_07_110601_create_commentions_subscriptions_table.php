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
        Schema::create(config('commentions.tables.comment_subscriptions', 'comment_subscriptions'), function (Blueprint $table) {
            $table->id();
            $table->morphs('subscribable');
            $table->morphs('subscriber');
            $table->timestamps();

            $table->unique([
                'subscribable_type', 'subscribable_id', 'subscriber_type', 'subscriber_id'
            ], 'commentions_subscriptions_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('commentions.tables.comment_subscriptions', 'comment_subscriptions'));
    }
};



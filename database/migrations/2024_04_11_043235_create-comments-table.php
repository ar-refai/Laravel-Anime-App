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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();                                   // Comment ID
            $table->unsignedBigInteger('user_id');  // Column name
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('show_id');  // Column name
            $table->foreign('show_id')->references('id')->on('shows');
            $table->text('content');                // Content
            $table->timestamps();                           // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

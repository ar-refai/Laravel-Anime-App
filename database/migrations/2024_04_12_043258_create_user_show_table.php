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
        Schema::create('user_show', function (Blueprint $table) {
            $table
                ->unsignedBigInteger('user_id');  // Column name
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table
                ->unsignedBigInteger('show_id');  // Column name
            $table
                ->foreign('show_id')
                ->references('id')
                ->on('shows');
            $table
                ->primary(['user_id','show_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_show');
    }
};

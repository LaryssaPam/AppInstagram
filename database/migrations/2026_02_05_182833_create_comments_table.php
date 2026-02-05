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
          $table->foreignId('userid')->constrained('users')->onDelete('cascade');
            $table->foreignId('postid')->constrained('posts')->onDelete('cascade');
            $table->text('content');
            $table->timestamps();
            
        
            $table->index('postid');
            $table->index(['postid', 'created_at']);
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

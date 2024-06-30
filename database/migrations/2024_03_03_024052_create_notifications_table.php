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

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('subject');
            $table->string('title');
            $table->string('media_type')->nullable(); // 'image' or 'video'
            $table->string('media_path')->nullable();
            $table->string('author_image');
            $table->string('author_description','5000');
            $table->string('message','5000');
            $table->enum('status', ['active', 'unactive', 'deleted'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};

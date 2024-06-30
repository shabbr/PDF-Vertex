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
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('project_id');

            $table->string('author')->nullable();
            $table->string('author_last_name')->nullable();
            $table->string('interviewer_first_name')->nullable();
            $table->string('interviewer_last_name')->nullable();

            $table->string('editor')->nullable();
            $table->text('title','2000')->nullable();
            $table->string('content_type')->nullable();
            $table->string('publish_date')->nullable();
            $table->string('url','2000')->nullable();
            $table->string('container','2000')->nullable();
            $table->string('volume')->nullable();
            $table->string('medium')->nullable();

            $table->string('number')->nullable();
            $table->string('pages')->nullable();
            $table->string('booktitle','2000')->nullable();
            $table->string('publisher',)->nullable();
            $table->string('institution')->nullable();
            $table->string('location')->nullable();

            $table->string('school')->nullable();
            $table->string('annotation','2000')->nullable();

            $table->string('view_date')->nullable();
            $table->enum('status', ['active', 'inactive', 'deleted'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websites');
    }
};

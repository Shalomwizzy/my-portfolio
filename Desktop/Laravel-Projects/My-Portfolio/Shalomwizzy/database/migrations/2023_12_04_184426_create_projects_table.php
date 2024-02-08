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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('image');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('ui_ux')->nullable(); 
            $table->string('front_end')->nullable(); 
            $table->string('back_end')->nullable();
            $table->string('stack_used')->nullable();
            $table->string('github_link')->nullable(); 
            $table->string('live_link')->nullable(); 
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

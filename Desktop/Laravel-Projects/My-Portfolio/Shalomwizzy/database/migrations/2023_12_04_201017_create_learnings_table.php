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
        Schema::create('learnings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('name');
            $table->string('image');
            $table->string('description')->nullable();
            $table->text('current_learning')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('status')->nullable(); 
            $table->text('tags')->nullable(); 
            $table->text('skills_gained')->nullable(); 
            $table->text('external_links')->nullable(); 
            $table->text('resources')->nullable(); 
            $table->unsignedTinyInteger('rating')->nullable(); 
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learnings');
    }
};

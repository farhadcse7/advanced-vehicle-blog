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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('img')->nullable();
            $table->text('description')->nullable();
            // $table->foreignId('user_id')->constrained()->onDelete('cascade'); //when user deleted, all related posts will be deleted
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); //when need to keep data even user deleted
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('views')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->integer('status')->default(0);
            $table->integer('is_banner')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

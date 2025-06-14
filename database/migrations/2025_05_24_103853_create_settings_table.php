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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('logo')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->text('address')->nullable();
            $table->text('copyright')->nullable();
            $table->string('map_url')->nullable();
            $table->string('fb')->nullable();
            $table->string('insta')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('blog_meta_title')->nullable();
            $table->text('blog_meta_desc')->nullable();
            $table->text('blog_meta_keywords')->nullable();
            $table->string('contact_meta_title')->nullable();
            $table->text('contact_meta_desc')->nullable();
            $table->text('contact_meta_keywords')->nullable();
            $table->text('headcss')->nullable();
            $table->text('footerscript')->nullable();
            $table->string('disqus')->nullable();
            $table->string('shareplugin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

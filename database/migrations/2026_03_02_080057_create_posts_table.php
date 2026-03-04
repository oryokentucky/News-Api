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
    $table->string('post_title');
    $table->text('post_description');
    $table->string('post_slug')->unique();
    $table->string('post_status'); // draft / publish
    $table->date('post_publish_date')->nullable();
    $table->boolean('is_deleted')->default(false);
    $table->string('language'); // en, cn, bm
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

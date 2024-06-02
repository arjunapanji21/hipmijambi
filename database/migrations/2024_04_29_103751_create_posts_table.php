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
            $table->text('content');
            $table->string('slug');
            $table->text('excerpt')->nullable();
            $table->integer('post_category_id');
            $table->text('featuredImage')->nullable();
            $table->enum('status', ['Draft', 'Publish']);
            $table->enum('comment_status', ['Disabled', 'Enabled'])->default('Disabled');
            $table->integer('author_id');
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->softDeletes();
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

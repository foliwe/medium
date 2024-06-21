<?php

use App\Models\Tag;
use App\Models\Blog;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Blog::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_tag');
    }
};
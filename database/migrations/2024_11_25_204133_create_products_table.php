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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('permalink')->unique();
            $table->enum('status', ['Published', 'Draft', 'Pending'])->default('Published');
            $table->double('selling_price')->nullable();
            $table->double('original_price')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_image')->nullable();
            $table->tinyInteger('is_index')->default(1);
            $table->tinyInteger('is_featured')->default(0);
            $table->integer('visited_count')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->string('_key', 32)->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

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
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->string('category')->index();
            $table->string('category_name');
            $table->string('tagline')->nullable();
            $table->text('summary');
            $table->longText('description');
            $table->string('capacity')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('weight')->nullable();
            $table->string('primary_material');
            $table->string('lining_material')->nullable();
            $table->string('hardware_specs')->nullable();
            $table->json('features')->nullable();
            $table->json('certifications')->nullable();
            $table->json('color_options')->nullable();
            $table->string('primary_image');
            $table->json('gallery_images')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_sustainable')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
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

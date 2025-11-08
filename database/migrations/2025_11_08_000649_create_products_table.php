<?php

use App\Enums\ProductFeaturedEnum;
use App\Enums\ProductStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->json('title');
            $table->string('code')->unique();
            $table->json('description');
            $table->text('image');
            $table->enum('featured', ProductFeaturedEnum::cases())->default(ProductFeaturedEnum::NO);
            $table->enum('status', ProductStatusEnum::cases())->default(ProductStatusEnum::ACTIVE->value);
            $table->timestamps();
            $table->softDeletes();
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

<?php

use App\Enums\WebsiteSettingStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description');
            $table->json('address')->nullable();
            $table->string('sales_email')->nullable();
            $table->string('support_email')->nullable();
            $table->string('sales_phone')->nullable();
            $table->string('support_phone')->nullable();
            $table->text('image');
            $table->enum('status', WebsiteSettingStatusEnum::cases())->default(WebsiteSettingStatusEnum::ACTIVE->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};

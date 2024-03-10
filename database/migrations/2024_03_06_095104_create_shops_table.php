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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('rayon_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('merchant_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('name');
            $table->string('latitude')->comment('Широта координатов');
            $table->string('longitude')->comment('Долгота координатов');
            $table->string('address')->nullable()->comment('Адрес магазина');
            $table->mediumText('schedule')->nullable()->comment('Время работы магазина');
            $table->string('phone')->nullable()->comment('Номер телефон магазина');
            $table->boolean('status')->default(1)->comment('Магазин актуален или нет');
            $table->dateTime('registered_at')->comment('Дата и время регистрации продавца в системе');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};

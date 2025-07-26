<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('crypto_ideas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('current_price', 16, 8);
            $table->enum('risk_level', ['low', 'moderate', 'high', 'extreme']);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('crypto_ideas');
    }
};

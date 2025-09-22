<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['price', 'pricing_type']);
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->nullable()->after('image');
            $table->enum('pricing_type', ['fixed', 'hourly', 'custom'])->default('fixed')->after('price');
        });
    }
};

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
        Schema::create('sim_cards', function (Blueprint $table) {
            $table->id();
            $table->string('scan_code')->nullable();
            $table->string('card_number')->nullable();
            $table->string('package')->nullable();
            $table->bigInteger('duration')->default(0);
            $table->timestamp('register_date')->nullable();
            $table->timestamp('expired_date')->nullable();
            $table->bigInteger('price')->default(0);
            $table->unsignedBigInteger('agency_id')->nullable();
            $table->string('status')->nullable();
            $table->string('otp_status')->nullable();
            $table->unsignedBigInteger('sim_type_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sim_cards');
    }
};

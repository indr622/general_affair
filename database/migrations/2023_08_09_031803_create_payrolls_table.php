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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained();
            $table->string('gapok', 50)->nullable();
            $table->string('bpjs_ketegakerjaan', 50)->nullable();
            $table->string('bpjs_kesehatan', 50)->nullable();
            $table->string('bpjs_pensiun', 50)->nullable();
            $table->string('total', 50)->nullable();
            $table->integer('periode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};

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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('branches');
            $table->foreignId('vendor_id')->constrained('vendors');
            $table->string('nik', 20)->unique();
            $table->string('name', 100);
            $table->enum('jabatan', ['ob', 'security']);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tgl_masuk');
            $table->date('tgl_keluar')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

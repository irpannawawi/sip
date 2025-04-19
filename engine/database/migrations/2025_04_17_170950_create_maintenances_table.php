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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->string('no_mwo')->primary();
            
            $table->date('request_date')->default(now());
            $table->date('verified_date')->nullable()->default(null);
            $table->unsignedBigInteger('input_by');
            $table->string('requester_name');
            $table->text('perihal');
            $table->text('problem');
            $table->text('location')->nullable();
            $table->string('foto')->nullable();
            $table->string('foto_verified')->nullable();
            $table->string('status');
            $table->string('verified_by')->nullable();
            $table->text('caused')->nullable();
            $table->text('action')->nullable();
            $table->timestamps();
            $table->foreign('input_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};

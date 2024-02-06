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
        Schema::create('claim_procedure', function (Blueprint $table) {
            $table->id();
            $table->foreignId('claim_id')->constrained();
            $table->foreignId('procedure_id')->constrained();
            $table->date('proc_start_date')->nullable();
            $table->date('proc_end_date')->nullable();
            $table->longText('details')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claim_procedure');
    }
};

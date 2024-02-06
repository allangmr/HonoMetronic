<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('claim_id')->unique();
            $table->text('details')->nullable();
            $table->date('claim_submission_date')->nullable();
            $table->date('claim_resolution_date')->nullable();
            $table->string('status')->nullable();

            // Foreign keys
            $table->unsignedBigInteger('id_patient')->nullable();
            $table->unsignedBigInteger('id_doctor')->nullable();

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_patient')->references('id')->on('patients')->onDelete('set null');
            $table->foreign('id_doctor')->references('id')->on('doctors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->dropForeign(['id_patient']);
            $table->dropForeign(['id_doctor']);
        });

        Schema::dropIfExists('claims');
    }
};

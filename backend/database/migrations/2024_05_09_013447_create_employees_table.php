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
            $table->string('first_surname', 20);
            $table->string('second_surname', 20);
            $table->string('first_name', 20);
            $table->string('middle_name', 50)->nullable();

            $table->string('job_country', 20);
            $table->string('id_type', 20);

            $table->string('id_number', 20)->unique();
            $table->string('email', 255)->unique();
            $table->date('date_of_entry');
            $table->string('deparment', 30);
            $table->integer('state')->default(1);

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

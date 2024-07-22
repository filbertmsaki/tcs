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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('membership_no')->unique();
            $table->string('fullname');
            $table->string('phone');
            $table->string('email');
            $table->string('mct_number')->nullable();
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('qualification');
            $table->date('qualified_year')->nullable();
            $table->string('sub_speciality_qualification')->nullable();
            $table->text('college_attained');
            $table->string('membership_type');
            $table->string('payment')->default('Not Paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

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
            $table->foreignId("employe_id")->references('id')->on('employes')->onUpdate('cascade')->onDelete('cascade');
            $table->string('months');
            $table->decimal('basic_salary', 10, 2);
            $table->decimal('house_rent_allowance', 10, 2);
            $table->decimal('convey_allowance', 10, 2);
            $table->decimal('medical_allowance', 10, 2);
            $table->decimal('spacial_allowance', 10, 2);
            $table->decimal('total_allowance', 10, 2);
            $table->decimal('income_tax', 10, 2);
            $table->decimal('pencion_tax', 10, 2);
            $table->decimal('insurance', 10, 2);
            $table->decimal('total_deduction', 10, 2);
            $table->decimal('total_amount', 10, 2);
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

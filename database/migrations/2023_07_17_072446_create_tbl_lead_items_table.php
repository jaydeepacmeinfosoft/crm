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
        Schema::create('tbl_lead_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iLeadId')->nullable();
            $table->string("vItem");
            $table->float("fQuantity");
            $table->double("dPrice");
            $table->float("dTax");
            $table->double("dAmount");
            $table->foreign('iLeadId')->references('iid')->on('tbl_lead')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_lead_items');
    }
};

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
        Schema::create('tbl_lead', function (Blueprint $table) {
            // $table->unsignedInteger('id', true)->unique()->primary();
            $table->id("iid");
            $table->string("vleadType");
            $table->string("vFullname");
            $table->string("vWhatsapp");
            $table->enum('eWhatsapp_type', ['Work', 'Office'])->nullable();
            $table->string("vCompany");
            $table->string("vEmail");
            $table->enum('eEmail_type', ['Work', 'Office'])->nullable();
            $table->string("vTitle");
            $table->string("vRemark");
            $table->double("dValue")->nullable();
            $table->string("vCurrency");
            $table->string("vPipeline");
            $table->double("dProbability")->nullable();
            $table->date("dExpectedStartDate")->nullable();
            $table->date("dExpectedCloseDate")->nullable();
            $table->string("vPlateform");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('every_ones');
    }
};

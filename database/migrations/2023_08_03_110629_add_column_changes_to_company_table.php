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
        Schema::table('companies', function (Blueprint $table) {
            $table->renameColumn("company_email","email");
            $table->dropColumn("password");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company', function (Blueprint $table) {
            //
        });
    }
};

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
        if (!Schema::hasColumn('admins', 'user_type')) {
            Schema::table('admins', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable()->after("id");
                $table->unsignedBigInteger('user_id')->nullable()->after("id");
                $table->integer("user_type")->nullable()->after("password")->comment('1 = admin ,2 = company , 3= company user');;
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('add_users')->onDelete('cascade');
            });
        }
    }

    /**
      */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            //
        });
    }
};

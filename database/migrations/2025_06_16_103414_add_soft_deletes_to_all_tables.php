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
        Schema::table('job_orders', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('contractors', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('conductors', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('job_order_statements', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('type_of_works', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('jos_job_order_links', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('all_tables', function (Blueprint $table) {
            //
        });
    }
};

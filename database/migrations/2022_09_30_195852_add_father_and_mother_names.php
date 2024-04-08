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
        Schema::table('deceaseds', function (Blueprint $table) {
            $table->string('father_name',255)->nullable()->default(null);
            $table->string('mother_name',255)->nullable()->default(null);
            $table->text('public_notes',10000)->nullable()->default(null);
            $table->text('admin_notes',10000)->nullable()->default(null);
            $table->string('vocation',255)->nullable()->default(null);
            $table->string('title',255)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deceaseds', function (Blueprint $table) {
            //
        });
    }
};

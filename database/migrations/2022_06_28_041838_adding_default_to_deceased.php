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
            $table->string('first_name')->default('EMPTY')->change();
            $table->string('last_name')->default('PLOT')->change();
            $table->date('date_of_birth')->default('01-01-0001')->change();
            $table->date('date_of_death')->default('01-02-0001')->change();
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

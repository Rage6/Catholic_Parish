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
        Schema::create('deceaseds', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('maiden_name')->nullable();
            $table->string('suffix_name')->nullable();
            $table->string('nickname')->nullable();
            $table->boolean('prefers_middle_name')->default(0);
            $table->string('date_of_birth',10)->nullable();
            $table->string('dob_month',2)->nullable();
            $table->string('dob_day',2)->nullable();
            $table->string('dob_year',4)->nullable();
            $table->string('date_of_death',10)->nullable();
            $table->string('dod_month',2)->nullable();
            $table->string('dod_day',2)->nullable();
            $table->string('dod_year',4)->nullable();
            $table->string('on_tombstone')->nullable();
            $table->string('spouse')->nullable();
            $table->string('children',2000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deceased');
    }
};

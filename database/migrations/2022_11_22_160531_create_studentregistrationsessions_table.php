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
        Schema::create('studentregistrationsessions', function (Blueprint $table) {
            $table->id();

            $table->string('session');
            $table->string('student_id');
            $table->string('proof_of_payment');
            $table->integer('status')->nullable();
            $table->integer('registered_by')->nullable();

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
        Schema::dropIfExists('studentregistrationsessions');
    }
};

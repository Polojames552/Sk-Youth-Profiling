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
        Schema::create('youths', function (Blueprint $table) {
            $table->id()->increments();
            $table->string('Fname');
            $table->string('Mname');
            $table->string('Lname');
            $table->string('EXTname');
            $table->date('Bday');
            $table->string('Age');
            $table->string('Sex');
            $table->string('parent');
            $table->string('CPno');
            $table->string('EducStatus');
            $table->string('Purok');
            $table->string('PWD');
            $table->string('CivilStatus');
            $table->string('Scholarship');
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
        Schema::dropIfExists('youths');
    }
};

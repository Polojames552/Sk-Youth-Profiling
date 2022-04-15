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
        Schema::create('youth_prints', function (Blueprint $table) {
            $table->id();
            $table->string('FullName');
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
            $table->string('Occupation');
            $table->string('Sports1');
            $table->string('Sports2');
            $table->string('Sports3');
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
        Schema::dropIfExists('youth_prints');
    }
};

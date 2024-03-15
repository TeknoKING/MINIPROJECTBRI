<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_asisten');
            $table->foreignId('id_material');
            $table->foreignId('id_kelas');
            $table->foreignId('id_code');
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->date('date');
            $table->string('teaching_role');
            $table->integer('duration')->nullable();
            $table->timestamps();
            $table->foreign('id_asisten')->references('id_asisten')->on('users');
            $table->foreign('id_material')->references('id')->on('materials');
            $table->foreign('id_kelas')->references('id')->on('kelas');
            $table->foreign('id_code')->references('id')->on('codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}

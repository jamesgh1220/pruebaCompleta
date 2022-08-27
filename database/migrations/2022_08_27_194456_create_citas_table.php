<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55)->nullable(false);
            $table->unsignedBigInteger('id_category_cita');
            $table->foreign('id_category_cita')->references('id')->on('category_citas');
            $table->unsignedBigInteger('id_state_cita');
            $table->foreign('id_state_cita')->references('id')->on('state_citas');
            $table->date('fecha');
            $table->text('observacion');
            $table->date('deleted_at')->nullable();
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
        Schema::dropIfExists('citas');
    }
}

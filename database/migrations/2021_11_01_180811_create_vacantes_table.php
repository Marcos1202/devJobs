<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
        });

        Schema::create('experiencias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
        });

        Schema::create('ubicacions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
        });

        Schema::create('salarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
        });

        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo');
            $table->string('imagen');
            $table->text('descripcion');
            $table->text('habilidades');
            $table->boolean('activa')->default(true);
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('experiencia_id')->constrained()->onDelete('cascade');
            $table->foreignId('ubicacion_id')->constrained()->onDelete('cascade');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacantes');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('ubicacions');
        Schema::dropIfExists('salarios');
        Schema::dropIfExists('experiencias');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_do_aluno', 50);
            $table->string('email', 200);
            $table->string('cpf', 200);
            $table->string('empresa', 12);
            $table->string('telefone', 20);
            $table->string('celular')->nullable();
            $table->enum('categoria', ['Estudante','Profissional','Associado']);
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
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
        Schema::dropIfExists('inscricaos');
    }
}

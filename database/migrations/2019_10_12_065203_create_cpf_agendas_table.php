<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpfAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpf_agendas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('uid')->unique();
            $table->string('subject');
            $table->date('date');
            $table->enum('status', [ 'created', 'takenup', 'deliberated', 'withdrawn', 'carried' ] )->default('created');
            $table->enum('proposal', ['confirmation', 'information and further direction', 'approval', 'ratification/appraisal', 'others' ] )->nullable();
            $table->string('agenda_url')->nullable();
            $table->string('presentation_url')->nullable();
            $table->boolean('is_circulated')->default(false);

            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('cpf_agendas');
    }
}

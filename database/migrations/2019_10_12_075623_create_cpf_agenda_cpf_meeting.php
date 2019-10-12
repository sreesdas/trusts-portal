<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpfAgendaCpfMeeting extends Migration
{
    public function up()
    {
        Schema::create('cpf_agenda_cpf_meeting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cpf_agenda_id');
            $table->bigInteger('cpf_meeting_id');
            $table->enum('status', [ 'takenup', 'deliberated', 'withdrawn', 'carried' ] )->default('takenup');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cpf_agenda_cpf_meeting');
    }
}

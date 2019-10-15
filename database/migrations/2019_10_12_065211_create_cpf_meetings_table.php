<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpfMeetingsTable extends Migration
{

    public function up()
    {
        Schema::create('cpf_meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->enum('status', [ 'scheduled', 'over' ] )->default('scheduled');

            $table->string('mom_url')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cpf_meetings');
    }
}

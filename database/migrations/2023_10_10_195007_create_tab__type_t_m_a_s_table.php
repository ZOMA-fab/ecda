<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabTypeTMASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab__type_t_m_a_s', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->date('date_saisie');
            $table->string('type_tma');
            $table->string('email_user');
            $table->date('updated_at');
            $table->date('created_at');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab__type_t_m_a_s');
    }
}

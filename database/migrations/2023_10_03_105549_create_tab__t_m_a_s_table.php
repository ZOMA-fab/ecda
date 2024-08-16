<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabTMASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('tab__t_m_a_s', function (Blueprint $table) {
        $table->id();
        $table->uuid('uuid')->unique();
        $table->date('date_saisie');
        $table->integer('code_tma');
        $table->string('nom_tma');
        $table->string('type_tma', 191); // Adjust the length if necessary
        $table->string('type_dossier_tma');
        $table->date('updated_at');
        $table->date('created_at');
        $table->string('email_user');

        // Primary key
        $table->unique(['code_tma', 'type_dossier_tma']); // Create a unique index for code_tma and type_dossier_tma

    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab__t_m_a_s');
    }
}

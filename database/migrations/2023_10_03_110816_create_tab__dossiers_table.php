<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab__dossiers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->date('date_saisie');
            $table->integer('code_tma');
            $table->string('type_tma');
            $table->string('type_dossier_tma');
            $table->string('type_document_tma');
            $table->string('document_tma');
            $table->date('updated_at');
            $table->date('created_at');
            $table->string('email_user');
            // $table->timestamps();
    
            // Change the foreign key definition to reference the 'code_tma' column in the 'tab__t_m_a_s' table
            $table->foreign(['code_tma', 'type_dossier_tma'])
                ->references(['code_tma', 'type_dossier_tma'])
                ->on('tab__t_m_a_s')
                ->onDelete('cascade');
    
            // If 'type_dossier_tma' is also a foreign key, set it separately as well
            // $table->foreign('type_dossier_tma')
            //     ->references('type_dossier_tma_column_name')
            //     ->on('tab__t_m_a_s')
            //     ->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab__dossiers');
    }
}

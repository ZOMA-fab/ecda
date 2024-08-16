<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabTypeDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab__type_documents', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->date('date_saisie');
            $table->string('type_document_tma');
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
        Schema::dropIfExists('tab__type_documents');
    }
}

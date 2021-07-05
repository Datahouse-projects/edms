<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('user_id');
            $table->double('version');
            $table->string('path');
            $table->string('filename');
            $table->string('extension');
            $table->longText('description')->nullable();
            $table->dateTime('upload_date')->nullable();
            $table->dateTime('filing_date')->nullable();
            $table->dateTime('end_retention_date')->nullable();
            $table->dateTime('end_deletion')->nullable();
            $table->string('fileq'); // file hash
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
        Schema::dropIfExists('documents');
    }
}

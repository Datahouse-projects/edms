<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjektsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objekts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->string('name');
            $table->integer('user_id');
            $table->double('version');
            $table->double('filesize');
            $table->string('path');
            $table->string('filename');
            $table->string('extension');
            $table->longText('description')->nullable();
            $table->dateTime('upload_date')->nullable();
            $table->dateTime('filing_date')->nullable();
            $table->dateTime('end_retention_date')->nullable();
            $table->dateTime('end_deletion')->nullable();
            $table->string('fileq')->comment = "file hash";
            $table->string('type')->comment = "folder=2 or file=1";
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
        Schema::dropIfExists('objekts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("path");
            $table->integer("ownerid")->unsigned();
            $table->integer("downloadcount")->default(0);
            $table->boolean("public");
            $table->string('ext');
            $table->integer('size');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            //https://www.drupal.org/project/node_view_permissions/issues/2564273
            $table->foreign('ownerid')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}

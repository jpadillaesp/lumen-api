<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',255);            
            $table->tinyInteger('confirmed');
            $table->tinyInteger('blacklisted');
            $table->tinyInteger('optedin');
            $table->integer('bouncecount');
            $table->dateTime('entered');
            $table->timestamp('modified');
            $table->string('uniqid',255);
            $table->string('uuid',36);
            $table->tinyInteger('htmlemail');
            $table->integer('subscribepage');
            $table->string('rssfrequency',100);
            $table->string('password');
            $table->date('passwordchanged');
            $table->tinyInteger('disabled');
            $table->text('extradata');
            $table->string('foreignkey',100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}

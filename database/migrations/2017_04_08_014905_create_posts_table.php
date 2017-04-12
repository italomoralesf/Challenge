<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('title', 128);
            $table->string('excerpt', 128);
            $table->string('slug',128)->unique();
            $table->text('body');
            
            $table->integer('user_id')->unsigned();
            
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}

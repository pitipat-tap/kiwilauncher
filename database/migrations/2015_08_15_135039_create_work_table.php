<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('work_history', function($table)
        {
            $table->increments('id');
            $table->integer('author_id')->references('id')->on('users');
			$table->string("name")->unique();
			$table->string("catagory");
            $table->text('discription');
            $table->string("link_url");

        });

        Schema::create('pic_work_history', function($table)
        {
            $table->increments('id');
            $table->integer('work_id')->references('id')->on('work_history');
            $table->string("link_url");

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('work_history');
		Schema::drop('pic_work_history');
	}

}

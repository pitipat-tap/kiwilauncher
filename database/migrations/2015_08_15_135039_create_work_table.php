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
            $table->string("status", 16);
			$table->string("title")->unique();
			$table->string("feature_image_url");
			$table->string("categories");
            $table->text('description');
            $table->integer("hits")->default(0);
            $table->string("url")->unique();
            $table->string("link_url");
            $table->boolean('is_featured')->default(0);

        });

        Schema::create('pic_work_history', function($table)
        {
            $table->increments('id');
            $table->integer('work_id')->references('id')->on('work_history');
            $table->string("pic_url");

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

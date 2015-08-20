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
		Schema::create('work_post', function($table)
        {
            $table->increments('id');
            $table->integer('author_id')->references('id')->on('users');
            $table->string("status", 16);
			$table->string("title")->unique();
			$table->string("feature_image_url");
            $table->text('description');
            $table->integer("hits")->default(0);
            $table->string("url")->unique();
            $table->string("link_url");
            $table->boolean('is_featured')->default(0);
            $table->timestamps();
        });

		Schema::create('work_categories', function($table)
        {
            $table->increments('id');
            $table->string("name");
        });

        Schema::create('work_post_categories', function($table)
        {
            $table->increments('id');
            $table->integer('work_id')->references('id')->on('work_post');
            $table->integer('categories_id')->references('id')->on('work_categories');
        });

        Schema::create('work_image', function($table)
        {
            $table->increments('id');
            $table->integer('work_id')->references('id')->on('work_post');
            $table->string("image_url");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('work_image');
		Schema::drop('work_post_categories');
		Schema::drop('work_categories');
		Schema::drop('work_post');
	}

}

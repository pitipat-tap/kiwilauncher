<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('image_posts', function($table)
        {
            $table->increments('id');
            $table->integer('author_id')->references('id')->on('users');
			$table->string("url")->unique();
			$table->string("image_url");
            $table->text('caption');
            $table->integer("hits")->default(0);
            $table->timestamps();
        });
		
		Schema::create('image_tags', function($table)
        {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->timestamps();
        });
        
        Schema::create('image_tags_posts', function($table)
        {
            $table->increments('id');
            $table->integer('image_id');
            $table->integer('tag_id');
            $table->timestamps("created_at");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('image_posts');
		Schema::drop('image_tags');
        Schema::drop('image_tags_posts');
	}

}

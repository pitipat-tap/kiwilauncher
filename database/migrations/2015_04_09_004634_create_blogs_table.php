<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog_posts', function($table)
        {
            $table->increments('id');
            $table->integer('author_id')->references('id')->on('users');
            $table->string('title', 128);
			$table->string("url")->unique();
            $table->text('description');
            $table->text('content');
            $table->string("feature_image_url");
            $table->string("status", 16);
            $table->integer("hits")->default(0);
            $table->timestamps();
        });
		
		Schema::create('blog_tags', function($table)
        {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->timestamps();
        });
        
        Schema::create('blog_tags_posts', function($table)
        {
            $table->increments('id');
            $table->integer('post_id');
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
		Schema::drop('blog_posts');
		Schema::drop('blog_tags');
        Schema::drop('blog_tags_posts');
	}

}

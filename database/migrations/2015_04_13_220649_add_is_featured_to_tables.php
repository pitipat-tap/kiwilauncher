<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsFeaturedToTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('blog_posts', function($table) {
			$table->boolean('is_featured')->default(0);
		});
		
		Schema::table('blog_tags', function($table) {
			$table->boolean('is_featured')->default(0);
		});
		
		Schema::table('image_posts', function($table) {
			$table->boolean('is_featured')->default(0);
		});
		
		Schema::table('image_tags', function($table) {
			$table->boolean('is_featured')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('blog_posts', function($table) {
			$table->dropColumn('is_featured');
		});
		
		Schema::table('blog_tags', function($table) {
			$table->dropColumn('is_featured');
		});
		
		Schema::table('image_posts', function($table) {
			$table->dropColumn('is_featured');
		});
		
		Schema::table('image_tags', function($table) {
			$table->dropColumn('is_featured');
		});
	}

}

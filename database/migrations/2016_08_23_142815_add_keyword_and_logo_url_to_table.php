<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeywordAndLogoUrlToTable extends Migration {
	public function up()
	{
		Schema::table('blog_posts', function($table)
		{
			$table->text('keyword');
		});

		Schema::table('work_post', function($table)
		{
			$table->string('logo_url');
			$table->text('keyword');
		});
	}

	public function down()
	{
		Schema::table('blog_posts', function($table) {
			$table->dropColumn('keyword');
		});

		Schema::create('work_post', function($table)
		{
			$table->dropColumn('logo_url');
			$table->dropColumn('keyword');
		});
	}
}

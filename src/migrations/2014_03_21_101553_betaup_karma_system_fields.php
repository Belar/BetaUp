<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BetaupKarmaSystemFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('beta_newsletters', function($table)
			{
				$table->string('refer')->nullable();
				$table->integer('karma')->default('0');

			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('beta_newsletters', function($table)
			{
				$table->dropColumn('refer', 'karma');
			});
	}
}

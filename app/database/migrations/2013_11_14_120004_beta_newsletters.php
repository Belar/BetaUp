<?php

use Illuminate\Database\Migrations\Migration;

class BetaNewsletters extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('beta_newsletters', function($table)
			{
				$table->increments('id');
				$table->string('email');
				$table->boolean('activated')->default(0);
				$table->string('activation_code')->nullable();
				$table->timestamp('activated_at')->nullable();
					
				$table->timestamps();

			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('beta_newsletters');
	}

}
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BetaupCreateBetaCodes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('beta_codes', function($table)
			{
                $table->increments('id');
			    $table->string('beta_code')->nullable();
                $table->boolean('available')->default(true);
                $table->timestamp('activated_at')->nullable();
                $table->integer('user_id')->nullable();
                
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
		Schema::drop('beta_codes');
	}

}

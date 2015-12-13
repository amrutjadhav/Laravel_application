<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddGcmToMobileRegistersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mobile_registers', function(Blueprint $table)
		{
			$table->string('gcm');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mobile_registers', function(Blueprint $table)
		{
			$table->dropColumn('gcm');
		});
	}

}

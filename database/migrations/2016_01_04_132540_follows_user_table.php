<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FollowsUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('follow_user', function(Blueprint $table)
		{
			$table->integer('following_user_id')->unsigned()->index();
			$table->foreign('following_user_id')->references('id')->on('users')->onDelete('cascade');

			$table->integer('follower_user_id')->unsigned()->index();
			$table->foreign('follower_user_id')->references('id')->on('users')->onDelete('cascade');

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
		Schema::drop('follow_user');
	}

}

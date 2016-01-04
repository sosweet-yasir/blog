<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForignKeysInFollowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('follows',function($table) {
            $table->integer('follower_user_id')->unsigned()->change();
            $table->foreign('follower_user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}

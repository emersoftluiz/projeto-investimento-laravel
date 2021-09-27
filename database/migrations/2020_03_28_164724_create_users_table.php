<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			
			//people data
			$table->char('cpf', 14)->unique()->nullalbe();
			$table->string('name', 50);
			$table->char('phone', 16);
			$table->date('birth')->nullalbe();
			$table->char('gender', 1)->nullalbe();
			$table->text('notes')->nullalbe();

			//auth data
			$table->string('email', 80)->unique();
			$table->string('password', 254)->nullalbe();
			
			//permission
			$table->string('status')->default('active');
			$table->string('permission')->default('app.user');

			$table->rememberToken();
			
			//created_at, updated_at
			$table->timestamps();
			//deleted_at
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {

		});

		Schema::drop('users');
	}
}

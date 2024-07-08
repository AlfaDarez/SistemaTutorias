<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telefono',10);
            $table->string('celular',10);
            $table->string('password');
            $table->string('casaTutora');
            $table->enum('nivel', ['1', '2','3','4'])->default('1');
            // 1 -> tutor, 2 ->admin 3->jefe 4-> suspendido
            $table->rememberToken();
            $table->timestamps();
             // Foreign keys
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

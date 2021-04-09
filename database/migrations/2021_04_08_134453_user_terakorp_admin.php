<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTerakorpAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function(Blueprint $table){
            $table->string('username')->unique();
            $table->string('roles');
            $table->text('alamat');
            $table->string('telepon');
            $table->string('avatar');
            $table->enum('status', ['ACTIVE', 'INACTIVE']);
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
         Schema::table('users', function(Blueprint $table){
            $table->dropColumn('username');
            $table->dropColumn('roles');
            $table->dropColumn('alamat');
            $table->dropColumn('telepon');
            $table->dropColumn('avatar');
            $table->dropColumn('status');
        });
    }
}

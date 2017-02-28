<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReadToChats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chats', function($table) {
            $table->boolean('read_admin')->default(false);
            $table->boolean('read_user')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chats', function($table) {
            $table->dropColumn('read_admin');
            $table->dropColumn('read_user');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAvatarOrderedColumnToStringInAvatarOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('avatar_orders', function (Blueprint $table) {
            $table->string('avatar_ordered')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('avatar_orders', function (Blueprint $table) {
            $table->integer('avatar_ordered')->change();
        });
    }
}

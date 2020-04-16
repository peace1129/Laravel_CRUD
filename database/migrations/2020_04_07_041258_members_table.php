<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('last_name', 50);
            $table->string('first_name', 50);
            $table->char('gender', 1);
            $table->string('pref', 5);
            $table->string('address', 100);
            $table->integer('group_id')->default(1);
            $table->timestamps();

            $table->foreign('group_id')
                  ->references('id')
                  ->on('groups')
                  ->onDelete('SET default');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}

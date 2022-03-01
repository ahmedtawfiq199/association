<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailToWibsits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('websits', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->string('telephone_number')->unique();
            $table->string('phone')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('websits', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('telephone_number');
            $table->dropColumn('phone');
        });
    }
}

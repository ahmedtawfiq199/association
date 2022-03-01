<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMenuIdToPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            //
            $table->foreignId('menu_id')->nullable()->constrained('menus')->nullOnDelete();
            $table->foreignId('sub_menus_id')->nullable()->constrained('sub_menus')->nullOnDelete();


        });
    }


    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            //
        });
    }
}

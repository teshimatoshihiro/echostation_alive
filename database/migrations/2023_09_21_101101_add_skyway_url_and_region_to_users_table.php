<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkywayUrlAndRegionToUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('skyway_url')->nullable();
            $table->enum('region', ['北海道', '東北', '関東', '中部', '近畿', '中国', '四国', '九州'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('skyway_url');
            $table->dropColumn('region');
        });
    }
}

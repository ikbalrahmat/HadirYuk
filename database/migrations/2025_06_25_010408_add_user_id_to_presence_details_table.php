<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Schema::table('presence_details', function (Blueprint $table) {
        //     $table->unsignedBigInteger('user_id')->after('presence_id');

        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        // });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('presence_details', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};

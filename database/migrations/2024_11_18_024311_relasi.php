<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cutis',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('Users')
            ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('cutis',function(Blueprint $table){
            $table->foreign('pegawai_id')->references('id')->on('pegawais')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cutis', function(Blueprint $table) {
            $table->dropForeign('cuti_pegawai_id_foreign');
        });
        Schema::table('cutis', function(Blueprint $table) {
            $table->dropIndex('cuti_pegawai_id_foreign');
        });


        Schema::table('cutis', function(Blueprint $table) {
            $table->dropForeign('cuti_user_id_foreign');
        });
        Schema::table('cutis', function(Blueprint $table) {
            $table->dropIndex('cuti_user_id_foreign');
        });
    }
};

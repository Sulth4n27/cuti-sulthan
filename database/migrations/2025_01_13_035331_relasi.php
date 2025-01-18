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


        Schema::table('cutis',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
        });



        // Schema::table('cutis',function(Blueprint $table){
        //     $table->foreign('pegawai_id')->references('id')->on('jabatans')
        //     ->onUpdate('cascade')->onDelete('cascade');
        // });




        // Schema::table('pegawais',function(Blueprint $table){
        //     $table->foreign('unitkerja_id')->references('id')->on('unitkerjas')
        //     ->onUpdate('cascade')->onDelete('cascade');
        // });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {


        // Schema::table('pegawais', function(Blueprint $table) {
        //     $table->dropForeign('pegawai_jabatan_id_foreign');
        // });
        // Schema::table('pegawais', function(Blueprint $table) {
        //     $table->dropIndex('pegawai_jabatan_id_foreign');
        // });


        Schema::table('cutis', function(Blueprint $table) {
            $table->dropForeign('cuti_users_id_foreign');
        });
        Schema::table('cutis', function(Blueprint $table) {
            $table->dropIndex('cuti_users_id_foreign');
        });







        // Schema::table('pegawais', function(Blueprint $table) {
        //     $table->dropForeign('pegawai_unitkerja_id_foreign');
        // });
        // Schema::table('pegawais', function(Blueprint $table) {
        //     $table->dropIndex('pegawai_unitkerja_id_foreign');
        // });


        Schema::dropIfExists('cutis');

    }
};

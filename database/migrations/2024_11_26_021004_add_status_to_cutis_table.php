<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('cutis', function (Blueprint $table) {
            $table->string('status')->default('pending')->after('alasan'); // Tambahkan kolom status
        });
    }

    public function down()
    {
        Schema::table('cutis', function (Blueprint $table) {
            $table->dropColumn('status'); // Hapus kolom status jika migrasi di-rollback
        });
    }

};

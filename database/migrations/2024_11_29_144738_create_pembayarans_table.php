<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string("no_pembayaran");
            $table->date("tgl_bayar");
            $table->string("nisn");
            $table->foreign("nisn")->references("nisn")->on("siswa")->onUpdate("cascade");
            $table->integer("jmlh_bulan");
            $table->integer("total_bayar");
            $table->enum("status", ["Pending", "Success", "Failed"]);
            $table->string("PGToken")->nullable()->comment("Token untuk pembayaran");
            $table->string("metode_pembayaran")->nullable();
            $table->foreign("metode_pembayaran")->references("kode_pembayaran")->on("metode_pembayaran")->onUpdate("cascade");
            $table->string("thn_ajaran");
            $table->foreign("thn_ajaran")->references("thn_ajaran")->on("tahun_ajaran")->onUpdate("cascade");
            $table->foreignId("user_id")->constrained("users")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
}

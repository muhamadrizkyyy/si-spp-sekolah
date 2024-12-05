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
            $table->float("total_bayar");
            $table->enum("status", ["Pending", "Success", "Failed"]);
            $table->string("PGToken");
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

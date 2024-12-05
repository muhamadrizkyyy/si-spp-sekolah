<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string("thn_ajaran");
            $table->foreign("thn_ajaran")->references("thn_ajaran")->on("tahun_ajaran")->onUpdate("cascade");
            $table->integer("bln_bayar");
            $table->foreignId("pembayaran_id")->constrained("pembayaran");
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
        Schema::dropIfExists('detail_pembayarans');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentitasWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas_web', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('nama_institusi');
            $table->text('alamat');
            $table->string('motto');
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
            $table->text('deskripsi');
            $table->string('usn_ig')->nullable()->comment("Diisi dengan username instagram tanpa @");
            $table->string('usn_fb')->nullable()->comment("Diisi dengan username facebook tanpa @");
            $table->string('usn_tiktok')->nullable()->comment("Diisi dengan username tiktok tanpa @");
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
        Schema::dropIfExists('identitas_webs');
    }
}

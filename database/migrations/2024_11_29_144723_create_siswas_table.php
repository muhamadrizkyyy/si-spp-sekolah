<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string("nisn")->unique();
            $table->string("nama");
            $table->enum("gender", ["L", "P"]);
            $table->date("tgl_lahir");
            $table->text("alamat")->nullable();
            $table->string("thn_ajaran");
            $table->foreign("thn_ajaran")->references("thn_ajaran")->on("tahun_ajaran")->onUpdate("cascade");
            $table->foreignId("kelas_id")->constrained("kelas")->onUpdate("cascade");
            $table->foreignId("jurusan_id")->constrained("jurusan")->onUpdate("cascade");
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
        Schema::dropIfExists('siswas');
    }
}

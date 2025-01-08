<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuitkuLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duitku_logs', function (Blueprint $table) {
            $table->id();
            $table->string("no_pembayaran")->nullable();
            $table->foreign("no_pembayaran")->references("no_pembayaran")->on("pembayaran")->onDelete("cascade")->onUpdate("cascade");
            $table->string("reference");
            $table->string("va_number");
            $table->text("payload")->nullable()->comment("berisi data json dari callback duitku");
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
        Schema::dropIfExists('duitku_logs');
    }
}

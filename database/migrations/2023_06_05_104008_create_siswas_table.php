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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelajaran_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->string("nama");
            $table->string("kelas");
            $table->string("nomor_absen");
            $table->foreign('pelajaran_id')->references("id")->on("pelajarans")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};

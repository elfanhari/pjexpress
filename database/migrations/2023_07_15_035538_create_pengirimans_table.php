<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengirimans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->unique()->constrained('pelanggans')->onDelete('cascade');
            $table->foreignId('kendaraan_id')->unique()->constrained('kendaraans')->onDelete('cascade');
            $table->string('no_pengiriman');
            $table->date('tgl_pengiriman');
            $table->string('nama_penerima');
            $table->string('alamat_penerima');
            $table->string('nama_barang');
            $table->bigInteger('jumlah_barang');
            $table->bigInteger('berat_barang');
            $table->bigInteger('biaya_kirim');
            $table->enum('status', ['Proses Pengiriman', 'Barang Terkirim']);
            $table->text('foto')->nullable();
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
        Schema::dropIfExists('pengirimans');
    }
}

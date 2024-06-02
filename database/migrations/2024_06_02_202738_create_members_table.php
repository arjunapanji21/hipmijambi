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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('tgl_lahir');
            $table->string('alamat');
            $table->string('telp');
            $table->string('sosmed')->nullable();
            $table->string('ktp');
            $table->string('foto');
            $table->enum('reference', ['Media Sosial', 'Berita', 'Website', 'Teman Yang Anggota HIPMI', 'Teman Bukan Anggota HIPMI', 'Lainnya']);
            $table->string('nama_usaha_sesuai_akta');
            $table->boolean('badan_usaha');
            $table->enum('jenis_usaha', ['UD', 'CV', 'PT', 'UMKM', 'Lainnya']);
            $table->string('bidang_usaha');
            $table->string('nama_usaha_yg_digunakan');
            $table->string('alamat_domisili_usaha');
            $table->string('telp_usaha');
            $table->string('email_usaha');
            $table->string('sosmed_usaha')->nullable();
            $table->string('website_usaha')->nullable();
            $table->string('logo_usaha')->nullable();
            $table->string('akta_pendirian_usaha')->nullable();
            $table->string('dokumen_usaha')->nullable();
            $table->string('foto_usaha')->nullable();
            $table->enum('status_approval', ['Pending', 'Approved'])->default('Pending');
            $table->enum('status_member', ['Inactive', 'Active'])->default('Inactive');
            $table->string('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

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
        Schema::create('mappings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('district_id');
            $table->string('village_id');
            $table->string('proposal_source');
            $table->string('proposal_year')->nullable();
            $table->string('planning_year')->nullable();
            $table->string('planning')->nullable();
            $table->string('budget')->nullable();
            $table->string('execution_year')->nullable();
            $table->string('photo')->nullable();
            $table->enum('population',['Tinggi', 'Sedang', 'Rendah', 'Tidak diketahui'])->nullable();
            $table->enum('condition',['Baik', 'Rusak Ringan', 'Rusak Sedang', 'Rusak Berat', 'Tidak diketahui'])->nullable();
            $table->enum('paving',['Aspal', 'Beton', 'Tanah', 'Tidak diketahui'])->nullable(); //perkerasan
            $table->enum('type', ['Jalan', 'Drainase'])->default('Jalan');
            $table->enum('status', ['Usulan', 'Valid', 'Perencanaan', 'Eksisting'])->default('Usulan');
            $table->double('length');
            $table->double('width');
            $table->geometry('polyline')->nullable();
            $table->integer('created_by')->nullable()->default(0);
            $table->integer('updated_by')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mappings');
    }
};

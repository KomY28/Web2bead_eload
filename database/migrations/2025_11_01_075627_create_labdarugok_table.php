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
        Schema::create('labdarugok', function (Blueprint $table) {
            $table->id(); // 'id'
            $table->integer('mezszam'); // 'mezszam'
            
            $table->unsignedBigInteger('klubid'); // 'klubid'
            $table->unsignedBigInteger('posztid'); // 'posztid'

            $table->string('utonev')->nullable();
            $table->string('vezeteknev');
            $table->date('szulido');
            $table->boolean('magyar');
            $table->boolean('kulfoldi');
            $table->integer('ertek');

            // Külső kulcsok összekapcsolása
            $table->foreign('klubid')->references('id')->on('klubok');
            $table->foreign('posztid')->references('id')->on('posztok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labdarugok');
    }
};
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
        Schema::create('uzenetek', function (Blueprint $table) {
            $table->id();
            
           
            $table->unsignedBigInteger('kuldo_id');
            
            
            $table->unsignedBigInteger('cimzett_id');
            
          
            $table->string('targy');
            
            
            $table->text('tartalom');
            
            
            $table->timestamp('olvasva_ekkor')->nullable();
            
            $table->timestamps(); 

            
            $table->foreign('kuldo_id')->references('id')->on('users');
            $table->foreign('cimzett_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uzenetek');
    }
};
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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',40);
            $table->string('apellidos',100);
            $table->string('correo',100);
            $table->string('password',255);
            $table->string('rol',40);
            $table->longText('imagenUrl');
            $table->timestamps();
        });

        Schema::create('tipos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo',40);
            $table->timestamps();
        });

        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 40);
            $table->longText('descripcion');
            $table->float('precio');
            $table->longText('imagenUrl');
        
            $table->unsignedBigInteger('idTipo'); 
            $table->foreign('idTipo')  
                  ->references('id')
                  ->on('tipos')
                  ->onDelete('restrict') 
                  ->onUpdate('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 10, 2);
            $table->integer('stock')->default(0);
            $table->boolean('activo')->default(true);

            // Campos Google Books API
            $table->string('google_books_id', 20)->unique()->nullable();
            $table->string('isbn_13', 13)->unique()->nullable();
            $table->string('imagen', 500)->nullable();
            $table->string('editorial', 255)->nullable();
            $table->year('anio')->nullable();
            $table->string('idioma', 10)->nullable();
            $table->integer('num_paginas')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};

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
        Schema::create('processors', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('cores');
            $table->integer('streams');
            $table->float('base_frequency');
            $table->float('max_frequency');

            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('processor_generation_id')->references('id')->on('processor_generations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('socket_id')->references('id')->on('sockets')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vendor_id')->references('id')->on('vendors')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processors');
    }
};

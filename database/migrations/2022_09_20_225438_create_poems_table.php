<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('poems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poet_id')
                ->constrained('poets');
            $table->unsignedBigInteger('translation_of')->nullable();
            $table->string('language', 5)->nullable();
            $table->string('title')->nullable();
            $table->string('created', 45)->nullable();
            $table->timestamps();
        });

        Schema::table('poems', function (Blueprint $table) {
            $table->foreign('translation_of')->references('id')->on('poems');
        });
    }

    public function down()
    {
        Schema::dropIfExists('poems');
    }
};

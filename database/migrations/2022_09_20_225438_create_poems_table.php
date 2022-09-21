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
            $table->integer('translation_of');
            $table->string('language', 5);
            $table->string('title')->nullable();
            $table->string('created', 45);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poems');
    }
};

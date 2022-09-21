<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('poets', function (Blueprint $table) {
            $table->id();
            $table->date('birth_date');
            $table->date('death_date')->nullable();
            $table->string('portrait_url')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poets');
    }
};

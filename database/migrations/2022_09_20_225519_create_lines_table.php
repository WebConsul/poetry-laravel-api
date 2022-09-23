<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poem_id')->constrained('poems');
            $table->string('text');
            $table->boolean('end_of_stanza')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lines');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('poets_data', function (Blueprint $table) {
            $table->id();

            $table->foreignId('poet_id')
                ->constrained('poets')
                ->cascadeOnDelete();

            $table->string('language', 5);

            $table->string('first_name', 45)->nullable();
            $table->string('last_name', 45);

            $table->string('description')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poets_data');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections_has_poets', function (Blueprint $table) {
            $table->foreignId('poet_id')
                ->constrained('poets')
                ->cascadeOnDelete();
            $table->foreignId('collection_id')
                ->constrained('collections')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections_has_poets');
    }
};

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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
			$table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
			$table->string('title')->nullable();
			$table->integer('amount')->nullable();
			$table->string('type')->nullable();
			$table->string('note')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->string('url', 250);
            $table->string('upvotes')->nullable();
            $table->string('downloads')->nullable();
            $table->string('price')->nullable();
            $table->double('rating');
            $table->text('description');
            $table->string('category');
            $table->enum('type', ['WEBAPP', 'ANDROID', 'IOS', 'EXTENSION'])->default('WEBAPP');
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
        Schema::dropIfExists('ideas');
    }
}

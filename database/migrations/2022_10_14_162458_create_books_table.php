<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title',100);
            $table->string('slug')->nullable();
            $table->string('serie',100)->nullable();
            $table->string('volume',50)->nullable();
            $table->integer('page_number')->default(0);
            $table->string('publishing_company',50);
            $table->date('date_start_reading');
            $table->date('date_end_reading')->nullable();
            $table->text('synopses');

            $table->uuid('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');


            $table->uuid('author_id')->index();
            $table->foreign('author_id')->references('id')->on('authors');

            $table->uuid('editora_id')->index();
            $table->foreign('editora_id')->references('id')->on('editoras');

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
        Schema::dropIfExists('books');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table
                ->unique(['user_id' , 'tweet_id']);
            $table
                ->foreignId('user_id')
                ->constrained()->
                onDelete('cascade');
            $table
                ->foreignId('tweet_id')
                ->constrained()
                ->onDelete('cascade');
                $table
                    ->boolean('liked');
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
        Schema::dropIfExists('likes');
    }
}

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
        //create a listigns table
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            //foregin key adedd,if user deleted also delete the user posts
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->string("title");
            $table->string("logo")->nullable(); //if it doestnt have an image its fine
            $table->string("tags");
            $table->string("company");
            $table->string("email");
            $table->string("website");
            $table->string("location");
            $table->longText("description");
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
        Schema::dropIfExists('listings');
    }
};

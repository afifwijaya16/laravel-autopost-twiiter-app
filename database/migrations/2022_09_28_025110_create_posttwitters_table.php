<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosttwittersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posttwitters', function (Blueprint $table) {
            $table->id();
            $table->text('post');
            // $table->text('image_post')->nullable();
            $table->text('url_image_post');
            $table->string('day_post');
            // $table->date('date_post');
            $table->time('time_post');
            $table->enum('status_post', ['Aktif', 'Tidak Aktif'])->default("Aktif");
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
        Schema::dropIfExists('posttwitters');
    }
}

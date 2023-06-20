<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('image_id');
            $table->string('short_name');
            $table->string('full_name');
            $table->string('text_for_playback');
            $table->string('change_effect');
            $table->bigInteger('change_image_interval');
            $table->string('font');
            $table->string('font_color');
            $table->integer('text_size');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};

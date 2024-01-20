<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up()
    {
        Schema::create('manhwa_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manhwa_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('manhwa_tag');
    }

};
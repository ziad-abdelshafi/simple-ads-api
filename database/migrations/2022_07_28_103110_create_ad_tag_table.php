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
        Schema::create('ad_tag', function (Blueprint $table) {
            $table->foreignId('ad_id')
                ->constrained('ads')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('tag_id')
                ->constrained('tags')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->primary(['ad_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_tag');
    }
};

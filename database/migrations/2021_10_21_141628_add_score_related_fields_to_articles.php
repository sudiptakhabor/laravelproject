<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScoreRelatedFieldsToArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->integer('evidence_quality')->nullable();
            $table->integer('evidence_complete')->nullable();
            $table->integer('content_novelty')->nullable();
            $table->integer('article_msg')->nullable();
            $table->integer('static_method')->nullable();
            $table->string('low_score_reason', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
}

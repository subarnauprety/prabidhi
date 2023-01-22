<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->longText('content_title')->nullable();
            $table->longText('content')->nullable();
            $table->string('blog_content_image');
            $table->foreign('blog_id')->references('id')->on('blogs')->cascadeOnDelete();

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
        Schema::dropIfExists('blog_contents');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_exam_id');
            $table->string('local_file')->nullable();
            $table->string('drive_file_id')->nullable();
            $table->enum('uploader_type', [ 'admin', 'user', 'anonymous' ]);
            $table->string('uploader_name')->nullable();
            $table->boolean('accepted')->default(false);

            $table->foreign('course_exam_id')
                ->references('id')->on('course_exam')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}

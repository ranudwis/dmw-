<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('semester_id')->nullable();
            $table->string('slug')->index();
            $table->string('code')->index();
            $table->string('title')->index();
            $table->integer('credit');
            $table->text('description');
            $table->boolean('is_visible')->default(true);

            $table->foreign('semester_id')
                ->references('id')->on('semesters')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->date('date');
			$table->time('registration');
			$table->time('meeting_time');
			$table->string('duration');
            $table->double('participant_price', 8, 2);
			$table->double('observer_price', 8, 2);
			$table->text("short_description");
			$table->text("who_should_attend");
            $table->integer('seat_limit')->default(0);
            $table->integer('available_seats')->default(0);
			//------
			$table->longText('details')->nullable();
			$table->longText('structure')->nullable();
			$table->longText('course_aims')->nullable();
			$table->longText('tmc')->nullable();
			$table->longText('study_aid')->nullable();
			$table->text('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('courses');
    }
}

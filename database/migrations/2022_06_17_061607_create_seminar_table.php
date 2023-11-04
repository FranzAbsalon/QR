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
        Schema::create('seminar', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number')->nullable();
            $table->datetime('start');
            $table->string('university');
            $table->string('certificate');
            $table->string('address');
            $table->string('logo');
            $table->string('template');
            $table->integer('signature_no');
            $table->string('signature1')->nullable();
            $table->string('signature2')->nullable();
            $table->datetime('end');
            $table->string('venue')->nullable();
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
        Schema::dropIfExists('seminar');
    }
};

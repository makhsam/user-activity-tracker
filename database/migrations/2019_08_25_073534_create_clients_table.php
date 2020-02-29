<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('site_id');
            
            $table->string('name');
            $table->string('phone_number', 15);
            $table->string('message', 511)->nullable();
            $table->string('address')->nullable();

            $table->timestamps();

            $table->foreign('site_id')->references('id')->on('sites');

            $table->engine = 'InnoDB';
            // $table->charset = 'utf8';
            // $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}

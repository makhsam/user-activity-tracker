<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->unsignedBigInteger('fingerprint')->primary();
            $table->unsignedInteger('site_id');
            $table->unsignedInteger('client_id')->nullable();
            
            $table->string('user_agent');
            $table->string('browser')->nullable()->comment('name & version');
            $table->string('engine')->nullable()->comment('name & version');
            $table->string('os')->nullable()->comment('name & version');

            $table->string('device_type', 31)->nullable();
            $table->string('device_model')->nullable()->comment('vendor & model');
            
            $table->string('cpu', 31)->nullable();
            $table->string('screen_resolution', 15)->nullable()->comment('Current Resolution');
            $table->unsignedSmallInteger('color_depth')->nullable();
            $table->string('plugins')->nullable();
            $table->string('mime_types')->nullable();
            $table->text('fonts')->nullable();
            $table->string('timezone', 63)->nullable();
            $table->string('language', 15)->nullable();

            $table->timestamps();

            $table->foreign('site_id')->references('id')->on('sites');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}

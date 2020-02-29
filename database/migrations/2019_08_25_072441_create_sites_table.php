<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');

            $table->string('name');
            $table->string('url', 63)->unique();
            $table->string('token')->unique();
            
            $table->boolean('activated')->default(false);
            $table->enum('plan', ['FREE', 'STANDARD', 'PREMIUM'])->default('FREE');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('sites');
    }
}

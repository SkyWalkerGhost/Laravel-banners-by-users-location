<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('target_country');
            $table->string('target_city');
            $table->string('target_os');
            $table->string('banner_image');
            $table->timestamp('placement_period')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('user_id');
            $table->charset = 'utf8';   
            $table->collation = 'utf8_general_ci'; 
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
        Schema::dropIfExists('banners');
    }
}

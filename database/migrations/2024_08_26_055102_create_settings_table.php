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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('email', '100');
            $table->string('mobile', '20')->nullable();
            $table->string('phone', '20')->nullable();
            $table->string('fb_url', '100')->nullable();
            $table->string('inst_url', '100')->nullable();
            $table->string('yt_url')->nullable();
            $table->string('tlg_url', '100')->nullable();
            $table->string('address')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('settings');
    }
};

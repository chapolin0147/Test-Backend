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
        Schema::create('redirect_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('url_id')->constrained();
            $table->string('unique_ip');
            $table->string('acess_total');
            $table->string('top_referrers');
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
        Schema::dropIfExists('redirect_stats');
    }
};

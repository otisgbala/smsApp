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
        Schema::create('message_delivery_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('message_id');
            $table->unsignedInteger('contact_id');
            $table->tinyInteger('deliveryStatus');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_delivery_reports');
    }
};

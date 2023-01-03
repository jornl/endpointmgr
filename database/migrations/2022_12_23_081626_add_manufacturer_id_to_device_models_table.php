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
        Schema::table('device_models', function (Blueprint $table) {
            $table->foreignId('manufacturer_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
        });

        Schema::table('device_models', function (Blueprint $table) {
            $table->foreignId('manufacturer_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('device_models', function (Blueprint $table) {
            //
        });
    }
};

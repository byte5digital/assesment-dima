<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'service_area_offer';

    /**
     * Run the migrations.
     * @table service_area_offer
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('service_area_id');
            $table->unsignedInteger('offer_id');
            $table->timestamps();

            $table->index(["offer_id"], 'offer_idx');


            $table->foreign('offer_id', 'offer_idx')
                ->references('id')->on('offers')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
;
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
    public $tableName = 'commitments';

    /**
     * Run the migrations.
     * @table commitments
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45)->nullable();
            $table->text('description')->nullable();
            $table->timestamp('start_timestamp')->nullable();
            $table->timestamp('end_timestamp')->nullable();
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('event_id');
            $table->unsignedInteger('customer_id');
            $table->timestamps();

            $table->index(["location_id"], 'location_id_idx');

            $table->index(["event_id"], 'commitment_event_idx');

            $table->index(["customer_id"], 'commitment_customer_idx');


            $table->foreign('location_id', 'location_id_idx')
                ->references('id')->on('locations')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('event_id', 'commitment_event_idx')
                ->references('id')->on('events')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('customer_id', 'commitment_customer_idx')
                ->references('id')->on('customers')
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
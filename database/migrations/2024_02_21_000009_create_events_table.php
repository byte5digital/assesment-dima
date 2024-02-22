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
    public $tableName = 'events';

    /**
     * Run the migrations.
     * @table events
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('start_timestamp')->nullable();
            $table->timestamp('end_timestamp')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('contact_person_id');
            $table->timestamps();

            $table->index(["customer_id"], 'event_customer_idx');

            $table->index(["contact_person_id"], 'contact_person_idx');


            $table->foreign('customer_id', 'event_customer_idx')
                ->references('id')->on('customers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('contact_person_id', 'contact_person_idx')
                ->references('id')->on('contact_persons')
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
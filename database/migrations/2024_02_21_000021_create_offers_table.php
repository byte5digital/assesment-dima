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
    public $tableName = 'offers';

    /**
     * Run the migrations.
     * @table offers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->float('price')->nullable();
            $table->unsignedInteger('price_group_id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('commitment_id');
            $table->timestamps();

            $table->index(["price_group_id"], 'price_group_idx');

            $table->index(["customer_id"], 'offers_customer_idx');

            $table->index(["commitment_id"], 'commitment_idx');


            $table->foreign('price_group_id', 'price_group_idx')
                ->references('id')->on('price_groups')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('customer_id', 'offers_customer_idx')
                ->references('id')->on('customers')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('commitment_id', 'commitment_idx')
                ->references('id')->on('commitments')
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
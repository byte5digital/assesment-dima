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
    public $tableName = 'invoices';

    /**
     * Run the migrations.
     * @table invoices
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('type')->nullable();
            $table->text('notes')->nullable();
            $table->float('total')->nullable();
            $table->timestamp('date')->nullable();
            $table->unsignedInteger('customer_id');
            $table->timestamps();

            $table->index(["customer_id"], 'customer_idx');


            $table->foreign('customer_id', 'customer_idx')
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
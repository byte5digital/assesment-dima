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
    public $tableName = 'commitment_invoice';

    /**
     * Run the migrations.
     * @table commitment_invoice
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('commitment_id');
            $table->unsignedInteger('invoice_id');
            $table->timestamps();
            
            $table->index(["invoice_id"], 'invoice_idx');


            $table->foreign('invoice_id', 'invoice_idx')
                ->references('id')->on('invoices')
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
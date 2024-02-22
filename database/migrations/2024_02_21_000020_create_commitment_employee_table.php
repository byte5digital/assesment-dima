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
    public $tableName = 'commitment_employee';

    /**
     * Run the migrations.
     * @table commitment_employee
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('commitment_id');
            $table->unsignedInteger('employee_id');
            $table->timestamps();

            $table->index(["employee_id"], 'commitment_employee_idx');


            $table->foreign('employee_id', 'commitment_employee_idx')
                ->references('id')->on('employees')
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
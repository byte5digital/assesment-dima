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
    public $tableName = 'occupations';

    /**
     * Run the migrations.
     * @table occupations
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('id');
            $table->string('name', 45)->nullable();
            $table->text('description')->nullable();
            $table->increments('event_id');
            $table->unsignedInteger('employee_id');
            $table->timestamps();

            $table->index(["employee_id"], 'occupation_employee_idx');


            $table->foreign('employee_id', 'occupation_employee_idx')
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
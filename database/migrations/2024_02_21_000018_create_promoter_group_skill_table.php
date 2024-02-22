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
    public $tableName = 'promoter_group_skill';

    /**
     * Run the migrations.
     * @table promoter_group_skill
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('promoter_group_id');
            $table->unsignedInteger('promoter_id');
            $table->unsignedInteger('skill_id');
            $table->timestamps();

            $table->index(["promoter_id"], 'promoter_idx');

            $table->index(["skill_id"], 'skill_idx');


            $table->foreign('promoter_id', 'promoter_idx')
                ->references('id')->on('promoters')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('skill_id', 'skill_idx')
                ->references('id')->on('skills')
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
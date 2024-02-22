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
    public $tableName = 'contact_persons';

    /**
     * Run the migrations.
     * @table contact_persons
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45)->nullable();
            $table->string('postition', 45)->nullable();
            $table->text('description')->nullable();
            $table->string('telephone_number', 45)->nullable();
            $table->string('address_street', 45)->nullable();
            $table->string('address_postalcode', 10)->nullable();
            $table->string('address_city', 45)->nullable();
            $table->string('address_country', 45)->nullable();
            $table->timestamps();
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
};

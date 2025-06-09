<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_contacts_table.php
public function up()
{
    Schema::create('contacts', function (Blueprint $table) {
        $table->id();
        $table->string('hotline');
        $table->string('email');
        $table->string('facebook');
        $table->string('address');
        $table->text('description');
        $table->timestamps();
    });
}
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_platforms', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->unique();
            /* IMPORTANT COLUMNS */
            $table->string('name')->unique();
            $table->string("main_url")->unique();
            $table->string('slug')->unique();
            /* IMPORTANT COLUMNS */
            $table->boolean("is_deleted")->default(false);
            $table->date("deleted_at")->nullable()->default(null);
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
        Schema::dropIfExists('resource_platforms');
    }
};

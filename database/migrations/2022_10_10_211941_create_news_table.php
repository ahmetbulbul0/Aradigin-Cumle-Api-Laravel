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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->unique();
            /* IMPORTANT COLUMNS */
            $table->string("title")->unique();
            $table->longText("content")->unique();
            $table->integer("author");
            $table->integer("category");
            $table->integer("resource_platform");
            $table->integer("resource_url");
            $table->date("added_time");
            $table->string("publish_status"); // task, published and planned
            $table->integer("publish_date")->nullable();
            $table->string('status'); // pending, approved, rejected
            $table->longText("slug")->unique();
            $table->boolean("is_approved")->default(false);
            $table->date("approved_at")->nullable();
            $table->integer("approved_by")->nullable();
            $table->boolean("is_rejected")->default(false);
            $table->date("rejected_at")->nullable();
            $table->integer("rejected_by")->nullable();
            $table->string("rejected_reason")->nullable();
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
        Schema::dropIfExists('news');
    }
};

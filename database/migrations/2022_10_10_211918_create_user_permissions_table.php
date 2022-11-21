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
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->unique();
            /* IMPORTANT COLUMNS */
            $table->integer('user_no');
            $table->boolean('is_banned')->default(false);
            /* IMPORTANT COLUMNS */
            /* PERMISSIONS */
            $table->boolean('change_visibility')->default(true);
            $table->boolean('change_profile_photo')->default(true);
            $table->boolean('change_website_theme')->default(true);
            $table->boolean('change_dashboard_theme')->default(true);
            $table->json('other')->nullable();
            /* PERMISSIONS */
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
        Schema::dropIfExists('user_permissions');
    }
};

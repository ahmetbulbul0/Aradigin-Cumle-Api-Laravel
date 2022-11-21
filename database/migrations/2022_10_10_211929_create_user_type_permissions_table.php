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
        Schema::create('user_type_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->unique();
            /* IMPORTANT COLUMNS */
            $table->integer('user_type_no');
            /* IMPORTANT COLUMNS */
            // available user types; author, editor, system
            /* PERMISSIONS */
            $table->boolean('create_category')->default(false);
            $table->boolean('edit_category')->default(false);
            $table->boolean('delete_category')->default(false);
            $table->boolean('want_new_category')->default(false);
            $table->boolean('create_resource_platform')->default(false);
            $table->boolean('edit_resource_platform')->default(false);
            $table->boolean('delete_resource_platform')->default(false);
            $table->boolean('want_new_resource_platform')->default(false);
            $table->boolean('create_news')->default(false);
            $table->boolean('edit_news')->default(false);
            $table->boolean('delete_news')->default(false);
            $table->boolean('change_news_status')->default(false);
            $table->boolean('ban_a_user')->default(false);
            $table->boolean('want_user_banned')->default(false);
            $table->boolean('restore_deleted')->default(false);
            $table->boolean('edit_type_permissions')->default(false);
            $table->boolean('edit_user_permissions')->default(false);
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
        Schema::dropIfExists('user_type_permissions');
    }
};

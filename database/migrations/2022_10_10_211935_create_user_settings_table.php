
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
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->unique();
            /* IMPORTANT COLUMNS */
            $table->integer('user_no')->unique();
            $table->boolean('is_public')->default(true);
            $table->string('profile_photo')->nullable()->default(null);
            $table->string('website_theme')->default('dark');
            $table->string('dashboard_theme')->default('dark');
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
        Schema::dropIfExists('user_settings');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->string('wallpaper')->nullable()->after('logo'); // adjust 'logo' to place it properly
        });
    }
    
    public function down()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn('wallpaper');
        });
    }
    
};

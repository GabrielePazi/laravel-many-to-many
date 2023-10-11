<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('types', function (Blueprint $table) {
            $table->dropForeign(['projects_id']);
            $table->dropColumn('projects_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('types', function (Blueprint $table) {
            $table->unsignedBigInteger('projects_id')->nullable();
            $table->foreign('projects_id')->references('id')->on("types");
        });

        
    }
};

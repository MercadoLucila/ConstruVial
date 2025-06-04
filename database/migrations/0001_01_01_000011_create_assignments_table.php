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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('end_motive')->nullable();
            $table->integer('kms')->nullable();
            $table->time('arrive_time')->nullable();
            $table->foreignId('worksite_id')->constrained('worksites')->onDelete('cascade');
            $table->foreignId('machine_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assignments', function (Blueprint $table) {
        $table->dropForeign(['machine_id']);
        });

        Schema::dropIfExists('assignments');
    }
};

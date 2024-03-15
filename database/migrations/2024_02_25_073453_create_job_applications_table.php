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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('job_id')->references('id')->on('jobs')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('company_id')->references('id')->on('users')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamp('applied_date');
            $table->string('status', 20)->default('pending');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};

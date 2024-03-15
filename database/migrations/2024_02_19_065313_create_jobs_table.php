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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('category_id')->references('id')->on('categories')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('job_type_id')->references('id')->on('job_types')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->string('title');
            $table->bigInteger('vacancy');
            $table->bigInteger('salary');
            $table->string('location')->nullable();
            $table->date('dateline');
            $table->text('description');
            $table->text('benefits')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('qualifications')->nullable();
            $table->string('Keywords')->nullable();
            $table->string('home_slider');
            $table->string('status')->default('1');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();





        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

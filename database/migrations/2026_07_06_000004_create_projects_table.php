<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('objectives')->nullable();
            $table->decimal('budget', 15, 2)->nullable();
            $table->decimal('amount_raised', 15, 2)->default(0);
            $table->decimal('funding_required', 15, 2)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('status')->default('draft');
            $table->integer('progress')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->string('featured_image')->nullable();
            $table->text('gallery')->nullable();
            $table->foreignId('pillar_id')->nullable()->constrained('pillars')->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

<?php

declare(strict_types=1);

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
        Schema::create('lessons', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('section_id')
                ->nullable()
                ->index()
                ->constrained('sections')
                ->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->unsignedTinyInteger('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->longText('content')->nullable();
            $table->boolean('is_starred')->default(false);
            $table->foreignId('folder_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->index('folder_id');
            $table->index('user_id');
            $table->timestamps();
       });
    }

    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};

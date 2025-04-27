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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users');
            $table->string('title');
            $table->text('description');
            $table->decimal('budget', 10, 2);
            $table->string('category');
            $table->timestamp('deadline');
            $table->enum('status', ['open', 'in_progress', 'completed'])->default('open');
            $table->timestamps();
        });
        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

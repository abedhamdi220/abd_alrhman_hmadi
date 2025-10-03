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
        // TODO: Create services table with appropriate fields
        // Fields should include: id, name, description, price, provider_id, category_id, status, timestamps
        // Add foreign key constraints to users and categories tables
        Schema::create('services', function (Blueprint $table) {
            // TODO: Implement table structure
               $table->id();                                   
            $table->string('description')->nullable();
            $table->enum('status',["pending","inactive","active"])->default('pending');                        
            $table->string('name')->unique();               
            $table->decimal('price', 10, 2);                
            $table->foreignId('provider_id')                
                  ->constrained('users')                    
                  ->cascadeOnDelete();                      
            $table->foreignId('category_id')                
                  ->constrained('categories')               
                  ->restrictOnDelete();                     
            $table->timestamps(); $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

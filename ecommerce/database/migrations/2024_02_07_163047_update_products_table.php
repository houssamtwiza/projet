<?php

use App\Models\Category;
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
        Schema::table('products', function (Blueprint $table) {
           
            $table->foreignIdFor(Category::class)->nullable()->constrained()->cascadeOnDelete();    //si je suprime une categorie je suprime tous les produits related to sinom je met null() au lieu de cascade       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
           
            $table->dropForeignIdFor(Category::class);  
        });
    }
};

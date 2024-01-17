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
        Schema::table('users', function (Blueprint $table) {           
            $table->foreignId('id_club')->constrained(table: 'clubs')->onDelete('cascade');
            $table->dropColumn('name');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('region');
            $table->string('city');
            $table->string('postal_code');            
            $table->date('birth_date');            
            $table->string('role');
            $table->string('img_profil')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

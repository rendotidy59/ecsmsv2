<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questionaire', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contractor_id')->constrained('contractors');
            for ($i = 1; $i <= 13; $i++) {
                $table->string("question{$i}_answer")->nullable();
                $table->string("question{$i}_attachment")->nullable();
            }
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questionaire');
    }
};

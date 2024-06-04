<?php

use App\Models\Santo;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('segnalazioni', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Santo::class)
                ->constrained('santi')
                ->cascadeOnDelete();
            $table->string('tipo_segnalazione');
            $table->string('testo_segnalazione');
            $table->boolean('evasa')
                ->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('segnalazioni');
    }
};

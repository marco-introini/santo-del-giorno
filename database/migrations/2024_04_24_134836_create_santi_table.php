<?php

use App\Models\Fonte;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('santi', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('giorno');
            $table->integer('mese');
            $table->text('note')->nullable();
            $table->foreignIdFor(Fonte::class)
                ->constrained()
                ->onDelete('restrict');
            $table->timestamps();

            $table->index(['giorno', 'mese']);
            $table->index('nome');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('santi');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('segnalazioni', function (Blueprint $table) {
            $table->text('note_chiusura')
                ->nullable()
                ->after('evasa');
        });
    }

    public function down(): void
    {
        Schema::table('segnalazioni', function (Blueprint $table) {
            $table->dropColumn('note_chiusura');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('santi', function (Blueprint $table) {
            $table->boolean('onomastico')
                ->default(false)
                ->after('mese');
            $table->boolean('onomastico_secondario')
                ->default(false)
                ->after('onomastico');
        });
    }

    public function down(): void
    {
        Schema::table('santi', function (Blueprint $table) {
            $table->dropColumn('onomastico');
            $table->dropColumn('onomastico_secondario');
        });
    }
};

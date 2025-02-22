<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('api_calls')
                ->default(0)
                ->after('avatar');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('api_calls');
        });
    }
};

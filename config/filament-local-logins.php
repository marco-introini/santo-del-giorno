<?php

use BetterFuturesStudio\FilamentLocalLogins\Filament\Pages\Auth\LoginPage;

return [
    'panels' => [
        'admin' => [
            'enabled' => env('ADMIN_PANEL_LOCAL_LOGINS_ENABLED', env('APP_ENV') === 'local'),
            'emails' => array_filter(array_map('trim', explode(',', (string) env('ADMIN_PANEL_LOCAL_LOGIN_EMAILS', '')))),
            'login_page' => LoginPage::class,
        ],
        'user' => [
            'enabled' => env('USER_PANEL_LOCAL_LOGINS_ENABLED', env('APP_ENV') === 'local'),
            'emails' => array_filter(array_map('trim', explode(',', (string) env('USER_PANEL_LOCAL_LOGIN_EMAILS', '')))),
            'login_page' => LoginPage::class,
        ],
    ],
];

<?php

namespace App\Filament\Admin\Resources\Users\Pages;

use Override;
use App\Filament\Admin\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    #[Override]
    protected static string $resource = UserResource::class;
}

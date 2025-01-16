<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
    public function include(string $relazione): bool
    {
        $param = request()->input('include','');
        $includeValues = explode(',', strtolower((string) $param));
        return in_array(strtolower($relazione), $includeValues);
    }
}

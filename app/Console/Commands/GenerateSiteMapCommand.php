<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSiteMapCommand extends Command
{
    protected $signature = 'generate:site-map';

    protected $description = 'Genera la sitemap del sito';

    public function handle(): void
    {
        SitemapGenerator::create('https://santodelgiorno.mintdev.me')
            ->getSitemap()
            ->writeToDisk('public', 'sitemap.xml');
    }
}

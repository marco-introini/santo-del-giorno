<?php

namespace App\Console\Commands;

use Override;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSiteMapCommand extends Command
{
    #[Override]
    protected $signature = 'generate:site-map';

    #[Override]
    protected $description = 'Genera la sitemap del sito';

    public function handle(): void
    {
        SitemapGenerator::create('https://santodelgiorno.marcointroini.it')
            ->getSitemap()
            ->writeToFile(public_path('sitemap.xml'));
    }
}

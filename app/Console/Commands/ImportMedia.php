<?php

namespace App\Console\Commands;

use App\Models\Media;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportMedia extends Command
{
    protected $signature = 'media:import {--dir=* : Specific directories to scan (sections, gallery, blog, programs, partners, events, team, uploads)}';
    protected $description = 'Scan storage directories and import existing images into the Media library';

    /**
     * Map of directories to collection names.
     */
    protected array $collections = [
        'uploads' => 'uploads',
        'sections' => 'sections',
        'gallery' => 'gallery',
        'blog' => 'blog',
        'programs' => 'programs',
        'partners' => 'partners',
        'events' => 'events',
        'team' => 'team',
    ];

    public function handle(): int
    {
        $disk = Storage::disk('public');
        $dirs = $this->option('dir') ?: array_keys($this->collections);

        $totalImported = 0;
        $totalSkipped = 0;

        foreach ($dirs as $dir) {
            $collection = $this->collections[$dir] ?? $dir;

            if (!$disk->exists($dir)) {
                $this->warn("Directory '{$dir}' does not exist. Skipping.");
                continue;
            }

            $files = $disk->files($dir);
            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'bmp'];

            $dirImported = 0;
            $dirSkipped = 0;

            foreach ($files as $filepath) {
                $extension = pathinfo($filepath, PATHINFO_EXTENSION);

                if (!in_array(strtolower($extension), $imageExtensions)) {
                    continue;
                }

                // Check if already imported
                if (Media::where('filename', $filepath)->exists()) {
                    $dirSkipped++;
                    continue;
                }

                $mimeType = $disk->mimeType($filepath);
                $fileSize = $disk->size($filepath);
                $originalName = pathinfo($filepath, PATHINFO_BASENAME);

                Media::create([
                    'filename' => $filepath,
                    'original_name' => $originalName,
                    'alt_text' => pathinfo($originalName, PATHINFO_FILENAME),
                    'mime_type' => $mimeType,
                    'file_size' => $fileSize,
                    'disk' => 'public',
                    'collection' => $collection,
                ]);

                $dirImported++;
            }

            $totalImported += $dirImported;
            $totalSkipped += $dirSkipped;

            $this->info("Scanned '{$dir}': {$dirImported} new, {$dirSkipped} already imported.");
        }

        $this->info("Done! Imported {$totalImported} images. {$totalSkipped} already existed.");

        return Command::SUCCESS;
    }
}

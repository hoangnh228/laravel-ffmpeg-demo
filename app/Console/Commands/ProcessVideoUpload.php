<?php

namespace App\Console\Commands;

use FFMpeg\Format\Video\X264;
use Illuminate\Console\Command;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ProcessVideoUpload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video-upload:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert the uploaded video into HLS.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $highFormat = (new X264('aac'))->setKiloBitrate(1000);

        FFMpeg::fromDisk('uploads')
            ->open('redfield.mp4')
            ->exportForHLS()
            ->addFormat($highFormat)
            ->toDisk('public')
            ->save('videos/redfield.m3u8');
    }
}

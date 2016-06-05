<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Video;
use Carbon\Carbon;

class AddVideo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:add {title} {realisator} {date=now}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a video';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = $this->argument('date');
        $video = [
            'title' => $this->argument('title'),
            'date' => ($date == 'now' ? Carbon::now() : Carbon::createFromFormat('Ymd', $date)),
            'realisator' => $this->argument('realisator'),
        ];

        Video::create($video);
    }
}

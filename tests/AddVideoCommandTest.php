<?php

use App\Video;
use Carbon\Carbon;

class AddVideoCommandTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
    }

    /** @test */
    function it_adds_a_video()
    {
        Artisan::call('video:add', [
            'title' => 'The Killing', 'realisator' => 'Veena Sud'
        ]);
        $lastVideo = Video::orderBy('id', 'desc')->first();

        $this->assertEquals($lastVideo->title, 'The Killing');
    }

    /** @test */
    function it_has_a_date_option()
    {
        Artisan::call('video:add', [
            'title' => 'Daredevil', 'realisator' => 'Drew Goddard', 'date' => '20150101'
        ]);
        $lastVideo = Video::orderBy('id', 'desc')->first();
        $date = new Carbon($lastVideo->date);

        $this->assertTrue($date->isSameDay(Carbon::createFromDate(2015, 01, 01)));
    }
}

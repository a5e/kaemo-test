<?php

use App\Video;

class VideosApiTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');
        $this->seed();
    }

    /** @test */
    function it_returns_valid_json()
    {

        $response = $this->call('GET', 'api/videos');
        $this->assertJson($response->getContent());
    }

    /** @test */
    function it_returns_a_videos_array()
    {
        $response = $this->call('GET', 'api/videos');

        $data =  json_decode($response->getContent());
        $this->assertInternalType('array', $data->videos);
    }

    /** @test */
    function it_accepts_a_from_parameter()
    {
        $expectedJson = '{"videos":[{"id":3,"title":"Show me a Hero","date":"2015-01-01 00:00:00","realisator":"David Simon"}],"count":1}';
        $jsonArray = json_decode($expectedJson, true);
        $this->json('GET', 'api/videos', ['from' => '20140101'])
             ->seeJsonEquals($jsonArray);
    }

    /** @test */
    function it_accepts_a_to_parameter()
    {
        $expectedJson = '{"videos":[
            {"id":1,"title":"The wire","date":"2002-01-01 00:00:00","realisator":"David Simon"},
            {"id":4,"title":"The office","date":"2005-01-01 00:00:00","realisator":"Ricky Gervais"},
            {"id":6,"title":"Dexter","date":"2006-01-01 00:00:00","realisator":"James Manos Jr."}
            ],"count":3}';
        $jsonArray = json_decode($expectedJson, true);
        $this->json('GET', 'api/videos', ['to' => '20070101'])
             ->seeJsonEquals($jsonArray);
    }

    /** @test */
    function it_accepts_a_realisator_parameter()
    {
        $expectedJson = '{"videos":[
            {"id":1,"title":"The wire","date":"2002-01-01 00:00:00","realisator":"David Simon"},
            {"id":2,"title":"Generation Kill","date":"2008-01-01 00:00:00","realisator":"David Simon"},
            {"id":3,"title":"Show me a Hero","date":"2015-01-01 00:00:00","realisator":"David Simon"}
            ],"count":3}';
        $jsonArray = json_decode($expectedJson, true);
        $this->json('GET', 'api/videos', ['realisator' => 'David Simon'])
             ->seeJsonEquals($jsonArray);
    }

    /** @test */
    function it_accepts_all_parameters()
    {
        $expectedJson = '{"videos":[
            {"id":2,"title":"Generation Kill","date":"2008-01-01 00:00:00","realisator":"David Simon"}
            ],"count":1}';
        $jsonArray = json_decode($expectedJson, true);
        $this->json('GET', 'api/videos', ['realisator' => 'David Simon', 'from' => '20040101', 'to' => '20100101'])
             ->seeJsonEquals($jsonArray);
    }

    /** @test */
    function it_show_one_video_by_id()
    {
        $expectedJson = '{"video":{"id":5,"title":"Breaking Bad","date":"2008-01-01 00:00:00","realisator":"Vince Gilligan"}}';
        $jsonArray = json_decode($expectedJson, true);
        $this->json('GET', 'api/videos/5')
             ->seeJsonEquals($jsonArray);
    }

    /** @test */
    function it_should_fail_if_id_is_not_a_positive_integer()
    {
        $this->json('GET', 'api/videos/notaninteger')
             ->assertResponseStatus(404);
        $this->json('GET', 'api/videos/-23')
            ->assertResponseStatus(404);
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class songbookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIReturnAListOfSongs()
    {

        //Because there is no actual database, the app starts in a static state.  I am setting a default list of songs, and am going to test
        //To insure that that list is returned.

        $expectedArray = [
            1=> [
                "songTitle" => "And I Love Her",
                "songArtist"=>"The Beatles",
                "songImagePages" => [
                    "And I Love Her_1.jpeg",
                    "And I Love Her_2.jpeg",
                ]
            ],
            2=> [
                "songTitle" => "Tell Me Why",
                "songArtist"=>"The Beatles",
                "songImagePages" => [
                    "Tell Me Why_1.jpeg",
                ]
            ]
        ];

        $response = $this->json('GET', '/api/SongListItems');
        $response->assertJson($expectedArray);
    }

    public function testICanReturnJustOneSong() {

        $expectedArray = [
                "songTitle" => "And I Love Her",
                "songArtist"=>"The Beatles",
                "songImagePages" => [
                    "And I Love Her_1.jpeg",
                    "And I Love Her_2.jpeg",
                ]
        ];

        $response = $this->json('GET', '/api/SongListItems/1');
        $response->assertJson($expectedArray);
    }

    public function testIReturnAnEmptyArrayWhenICannotFindSong() {
        $expectedArray = [];

        $response = $this->json('GET', '/api/SongListItems/99999');
        $response->assertJson($expectedArray);
    }

    public function testValidationFailsWhenIAddASongWithMissingInput()
    {

        $songToAdd = [
            "songTitle" => "Please Please Me",
        ];

        $response = $this->json('POST', '/api/SongListItems', $songToAdd);

        $response
            ->assertJson([
                'created' => false,
            ]);
    }

    public function testICanAddASong()
    {

        $songToAdd = [
            "songTitle" => "Please Please Me",
            "songArtist"=>"The Beatles",
            "songImagePages" => [
                "Please Please Me_1.jpeg",
                "Please Please Me_2.jpeg",
            ]
        ];

        $response = $this->json('POST', '/api/SongListItems', $songToAdd);

        $response
            ->assertJson([
                "songTitle" => "Please Please Me",
                "songArtist"=>"The Beatles",
                "songImagePages" => [
                    "Please Please Me_1.jpeg",
                    "Please Please Me_2.jpeg",
                ]
            ]);
    }
}

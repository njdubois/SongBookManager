<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 6/4/18
 * Time: 3:14 PM
 */

namespace App\Classes;


class SongBookData
{

    private $currentSongListArray = [
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

    public function getAllSongs() {
        return $this->currentSongListArray;
    }

    public function getOneSong($id) {

        if (isset($this->currentSongListArray[$id])) {
            return $this->currentSongListArray[$id];
        }

        return [];
    }

    public function addOneSong($newSongArray) {
        $this->currentSongListArray[] = $newSongArray;

        return $this->currentSongListArray[ ( count($this->currentSongListArray) )];
    }
}
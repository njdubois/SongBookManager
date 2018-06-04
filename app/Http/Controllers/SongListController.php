<?php

namespace App\Http\Controllers;

use App\Classes\SongBookData;
use Illuminate\Http\Request;
use Validator;


class SongListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json((new SongBookData)->getAllSongs());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'songTitle' => 'required',
            'songArtist' => 'required',
            'songImagePages' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(["created"=>false, "response" => $validator->messages()]);
        }

        return (new SongBookData())->addOneSong($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json((new SongBookData)->getOneSong($id));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

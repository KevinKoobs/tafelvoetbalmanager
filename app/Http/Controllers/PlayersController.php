<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Classifications;
use DB;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPlayers = Player::select(['name', 'id'])->orderBy('name', 'ASC')->get();
        return view('players.index')->with('players', $allPlayers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input
        $this->validate($request, [
            'name' => 'required|unique:players'
        ]);

        // Create new player
        $player = new Player;
        $player->name = $request->input('name');
        $player->save();

        $classification = new Classifications;
        $classification->teamname = $request->input('name');
        $classification->played = 0;
        $classification->points = 0;
        $classification->wins = 0;
        $classification->draws = 0;
        $classification->losses = 0;
        $classification->goals_for = 0;
        $classification->goals_against = 0;
        $classification->save();

        return redirect('/players')->with('success', 'Aanmaken van speler ' . $request->input('name') . ' is gelukt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::find($id);
        return view('players.show')->with('player', $player);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

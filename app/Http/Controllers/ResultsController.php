<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use App\Player;
use App\Classifications;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allResults = Result::orderBy('created_at', 'desc')->paginate(20);
        return view('results.index')->with('results', $allResults);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allPlayers = Player::select(['name'])->orderBy('name', 'ASC')->get();
        $arrayPlayers = [];
        foreach ($allPlayers as $key => $value) {
            $arrayPlayers[$value->name] = $value->name;
        }
        return view('results.create')->with('players', $arrayPlayers);
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
            'team1' => 'required|different:team2',
            'team2' => 'required|different:team1',
            'result' => array('required', 'regex:/(^[0-9]*[-][0-9]*)/')
        ]);

        $result = new Result;
        $result->team1 = $request->input('team1');
        $result->team2 = $request->input('team2');
        $result->result = $request->input('result');
        $result->save();

        $gameResult = $request->input('result');
        $gameResult = explode('-', $gameResult);
        $result1 = $gameResult[0];
        $result2 = $gameResult[1];

        $curr_classification = Classifications::where('teamname', '=', $request->input('team1'))->get();
        $classification = Classifications::where('teamname', '=', $request->input('team1'))->get();
        $classification[0]->played = $curr_classification[0]->played + 1;

        if ($result1 > $result2) {
            $classification[0]->points = $curr_classification[0]->points + 3;
            $classification[0]->wins = $curr_classification[0]->wins + 3;
        } elseif ($result1 == $result2) {
            $classification[0]->points = $curr_classification[0]->points + 1;
            $classification[0]->draws = $curr_classification[0]->draws + 1;
        } else {
            $classification[0]->losses = $curr_classification[0]->losses + 1;
        }
        $classification[0]->goals_for = $curr_classification[0]->goals_for + $result1;
        $classification[0]->goals_against = $curr_classification[0]->goals_against + $result2;

        $classification[0]->save();

        $curr_classification = Classifications::where('teamname', '=', $request->input('team2'))->get();
        $classification = Classifications::where('teamname', '=', $request->input('team2'))->get();
        $classification[0]->played = $curr_classification[0]->played + 1;

        if ($result2 > $result1) {
            $classification[0]->points = $curr_classification[0]->points + 3;
            $classification[0]->wins = $curr_classification[0]->wins + 3;
        } elseif ($result1 == $result2) {
            $classification[0]->points = $curr_classification[0]->points + 1;
            $classification[0]->draws = $curr_classification[0]->draws + 1;
        } else {
            $classification[0]->losses = $curr_classification[0]->losses + 1;
        }
        $classification[0]->goals_for = $curr_classification[0]->goals_for + $result2;
        $classification[0]->goals_against = $curr_classification[0]->goals_against + $result1;

        $classification[0]->save();

        return redirect('/results')->with('success', 'Uitslag is ingevoerd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

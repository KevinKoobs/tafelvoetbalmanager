<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PagesController extends Controller
{

    public function index() {

        $title = 'Tafelvoetbalmanager!';
        $paragraph = 'Vul wedstrijden in, bekijk de stand en bepaal de winnaar!';

        $data = array(
            'title' => $title,
            'paragraph' => $paragraph,
            'players' => Player::all()
        );


        // return view('pages.index', compact('title'));
        return view('pages.index')->with($data);

    }

    public function addgame() {

        return view('pages.addgame');

    }

    public function standings() {

        return view('pages.standings');

    }

}
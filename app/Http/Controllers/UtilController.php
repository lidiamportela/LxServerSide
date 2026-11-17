<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function loadWelcome() {
    return view('welcome');
    }

    public function loadHomepage() {

    // dados q no futuro estarão definidos no controller e vêm da bd.
    $courseName = 'SD';

    // simulação q vou à bd e trago a lista de alunos
    $students = ['Licínia', 'Raquel', 'João', 'Leonel'];

    //array associativo
    //dados q serão carregados da bd
    $contactInfo = [
        'name' => 'Bruno',
        'contact' => 'Bruno@cesae.pt'
        ];

    $cesaeInfo = [
        'name' => 'CESAE Digital',
        'address' => 'Rua Blabla',
        'email' => 'geral@cesae.pt'
    ];

    //dd($contactInfo);  //debug
    //var_dump($contactInfo);

    return view('home', compact('courseName', 'students', 'contactInfo', 'cesaeInfo'));   //'home' - nome do file nas views
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $data['pageTitle'] = 'Home page';
        return view('pages.home.home-page', [
            'data' => $data,
        ]);
    }
}

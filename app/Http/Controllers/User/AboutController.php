<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(
    )
    {
    }


    public function privacy()
    {
        return view('pages.about.privacy',
            [
            ]
        );
    }

    public function term()
    {
        return view('pages.about.term',
            [
            ]
        );
    }
}

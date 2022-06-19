<?php

namespace App\Http\Controllers\Profile\Links;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('profile.links.show',[
            'user' => auth()->user()->load('profile.links')
        ]);
    }
}

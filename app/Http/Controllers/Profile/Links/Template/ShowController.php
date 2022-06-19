<?php

namespace App\Http\Controllers\Profile\Links\Template;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Link $link)
    {
        return view("profile.links.templates.{$link->template}",
        [ 'profile' => $link->profile ]
        );
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function posts()
    {
      return view('portal.portal');
    }
}

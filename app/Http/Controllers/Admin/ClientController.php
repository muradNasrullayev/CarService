<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function index():View
    {
      $clients =  Client::query()->select( 'name', 'email','password')
          ->paginate(20);
      return view('admin.client.index', compact('clients'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
      $clients =  Client::query()->select( 'name', 'email','password')->get();
      return view('admin.clients.index', compact('clients'));
    }
}

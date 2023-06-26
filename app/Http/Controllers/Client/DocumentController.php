<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function privacy()
    {
        return view('client.documents.privacy');
    }

    public function termsConditions()
    {
        return view('client.documents.termsconditions');
    }
}

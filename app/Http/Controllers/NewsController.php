<?php

namespace App\Http\Controllers;

use App\Configuration;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function manage () {
        $configuration=Configuration::find(1);
        return view('admin.news.index',compact('configuration'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Inertia\Inertia;

class PageController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::guard('web')->user();
    }

    public function index()
    {
        return Inertia::render('Pages/Home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    const VIEW='account';
    const URL='account';
    const TITLE='Account';

    public function index()
    {
        return view(self::VIEW.'.index');
    }
}

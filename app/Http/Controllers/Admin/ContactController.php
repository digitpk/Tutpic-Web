<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts=ContactUs::all();
        return view('_admin.contact.index', compact('contacts'));
    }
}

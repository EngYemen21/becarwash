<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function index()
    {

        $packages = Package::with('services')->get();
        return view('index', compact('packages'));
    }
    public function workpage()
    {
        return view('user.works.index');
    }

    public function contactpage()
    {
        return view('user.contact.index');
    }

    public function showServicesPricing()
    {

        $packages = Package::with('services')->get();
        return view('user.services.index', compact('packages'));
    }
}

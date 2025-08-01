<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $steps = [
            ['title' => 'Design Brief', 'completed' => true],
            ['title' => 'Upload Assets', 'completed' => false],
            ['title' => 'Confirmation', 'completed' => false],
        ];

        $currentStep = 1;

        // Example data, replace with your actual data source
        $logos = [
            ['id' => 1, 'name' => 'Logo 1', 'url' => '/images/logo1.png'],
            ['id' => 2, 'name' => 'Logo 2', 'url' => '/images/logo2.png'],
        ];
        $colors = [
            ['id' => 1, 'name' => 'Red', 'hex' => '#FF0000'],
            ['id' => 2, 'name' => 'Blue', 'hex' => '#0000FF'],
        ];
        $packages = [
            ['id' => 1, 'name' => 'Basic', 'price' => 99],
            ['id' => 2, 'name' => 'Premium', 'price' => 199],
        ];

        return view('index', compact('steps', 'currentStep', 'logos', 'colors', 'packages'));
    }

    public function showDashboard()
    {
        $currentStep = 1; // Or retrieve this value dynamically from a database, session, etc.
        return view("index")->with("currentStep", $currentStep);
    }
}

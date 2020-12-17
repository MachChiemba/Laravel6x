<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Console\ControllerMakeCommand;
use Illuminate\Routing\Controller as RoutingController;

class TestController extends ControllerMakeCommand
{
    public function teste(){
        return 'Teste Controller';
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class UpdateEnvController extends Controller
{
    public function showForm(){
        return view('app_form');
    }

    public function saveForm(){
        $envFile = base_path('.env');
        $env = File::get($envFile);

        foreach ($_POST as $key => $value) {
          // Only update keys that exist in the .env file
          if (strpos($env, $key) !== false) {
            $env = preg_replace("/$key=.*/", "$key=$value", $env);
          }
        }

        File::put($envFile, $env);

        return redirect()->back();
    }
}

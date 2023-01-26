<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Operation;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $user;
    private $module;
    private $operation;
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Module $module, Operation $operation)
    {
        //$this->middleware('auth');
        $this->user = $user;
        $this->module = $module;
        $this->operation = $operation;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        return view('home');
    }
    
    public function master()
    {
        if($this->user->count()){$users = $this->user->count();}else{$users=0;}        
        if($this->module->count()){$modules = $this->module->count();}else{$modules=0;}
        if($this->operation->count()){$operations = $this->operation->count();}else{$operations = 0;}        
        return response()->json([
            'users' => $users,
            'modules' => $modules,
            'operations' => $operations,
        ]);
    }
    
}

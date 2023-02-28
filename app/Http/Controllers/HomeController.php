<?php

namespace App\Http\Controllers;

/* use App\Models\Authorization;
use App\Models\Module;
use App\Models\Operation;
use App\Models\User; */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /* private $user;
    private $module;
    private $operation;
    private $authorization; */
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /*  public function __construct(User $user, Module $module, Operation $operation, Authorization $authorization)
    {
        //$this->middleware('auth');
        $this->user = $user;
        $this->module = $module;
        $this->operation = $operation;
        $this->authorization = $authorization;
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {     
        $users = Http::get('http://192.168.251.56:8501/docs/api/v1/users/');  //$this->user->with('roule')->orderByDesc('id')->get();
       
        return view('dashboard.index',[
            'users' => $users,
        ]);
    }
    
    public function master()
    {
        /* if($this->user->count()){$users = $this->user->count();}else{$users=0;}        
        if($this->module->count()){$modules = $this->module->count();}else{$modules=0;}
        if($this->operation->count()){$operations = $this->operation->count();}else{$operations = 0;}       
        
         $user = auth()->user();
        $authorizations = $this->authorization
                               ->with('modules','operations','roules') 
                               ->whereRoules_id($user->roules_id)
                               ->get();
 
        return response()->json([
            'users' => $users,
            'modules' => $modules,
            'operations' => $operations,
            'user' => $user,
            'authorizations' => $authorizations,
        ]);
        */
    }

    
}

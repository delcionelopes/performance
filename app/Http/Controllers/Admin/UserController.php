<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $user;
    private $roule;

    public function __construct(User $user, Roule $roule)
    {
        $this->user = $user;
        $this->roule = $roule;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(is_null($request->pesquisa)){
            $users = $this->user->orderByDesc('id')->paginate(6);
        }else{
            $query = $this->user->with('roule')->query()
                          ->where('name','LIKE','%'.strtoupper($request->pesquisa).'%');
            $users = $query->orderByDesc('id')->paginate(6);
        }
        $roules = $this->roule->all();
        return view('admin.user.index',[
            'users' => $users,
            'roules' => $roules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','max:50'],
            'email' => ['required','email','unique:users','max:100'],
            'password' => ['required','min:8','max:10'],
            'profile' => ['required','integer'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);            
        }else{
            $filePath="";
            if($request->hasFile('imagem')){
            $file = $request->file('imagem');                           
            $fileName =  $file->getClientOriginalName();                
            $filePath = 'avatar/'.$fileName;
            $storagePath = public_path().'/storage/avatar/';
            $file->move($storagePath,$fileName);            

                   ///excluir foto temporária      
                    $tempPath = public_path().'/storage/temp/'.$fileName;
                    if(file_exists($tempPath)){
                        unlink($tempPath);
                    }
           
            }

            $data['id'] = $this->autoincUser();
            $data['email'] = $request->input('email');
            $data['password'] = bcrypt($request->input('password'));
            $data['roules_id'] = intval($request->input('profile'));
            $data['enabled'] = 1;
            if($filePath){
                $data['avatar'] = $filePath;
            }
            $user = $this->user->create($data);
            $roule = $user->roule;

            return response()->json([
                'status' => 200,
                'user' => $user,
                'roule' => $roule,
            ]);
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $user = $this->user->with('roule')->find($id);
        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','max:50'],
            'email' => ['required','email','unique:users','max:100'],
            'password' => ['required','min:8','max:10'],
            'profile' => ['required','integer'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);            
        }else{
            $user = $this->user->find($id);
            if($user){
            $filePath="";
            if($request->hasFile('imagem')){
                //exclui a foto antiga se houver
                if($user->avatar){
                    $antigoPath = public_path().'/storage/'.$user->avatar;
                    if(file_exists($antigoPath)){
                        unlink($antigoPath);
                    }
                }
            $file = $request->file('imagem');                           
            $fileName =  $file->getClientOriginalName();                
            $filePath = 'avatar/'.$fileName;
            $storagePath = public_path().'/storage/avatar/';
            $file->move($storagePath,$fileName);            

                   ///excluir foto temporária      
                    $tempPath = public_path().'/storage/temp/'.$fileName;
                    if(file_exists($tempPath)){
                        unlink($tempPath);
                    }
           
            }            
            $data['email'] = $request->input('email');
            $data['password'] = bcrypt($request->input('password'));
            $data['enabled'] = intval($request->input('enabled'));
            $data['roules_id'] = intval($request->input('profile'));
            $data['enabled'] = 1;
            if($filePath){
                $data['avatar'] = $filePath;
            }
            $user->update($data);
            $u = User::find($id);
            $roule = $u->roule;

            return response()->json([
                'status' => 200,
                'user' => $u,
                'roule' => $roule,
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Registro não localizado!',
            ]);
        }
            
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $user = $this->user->find($id);
        $user->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Registro excluído com sucesso!',
        ]);
    }

    protected function autoincUser(){
        $user = $this->user->orderByDesc('id')->first();
        if($user){
            $codigo = $user->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Authorization;
use App\Models\Modope;
use App\Models\Roule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RouleController extends Controller
{
    private $roule;
    private $modope;
    private $authorization;

    public function __construct(Roule $roule, Modope $modope, Authorization $authorization)
    {
        $this->roule = $roule;
        $this->modope = $modope;
        $this->authorization = $authorization;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(is_null($request->pesquisa)){
            $roules = $this->roule->orderByDesc('id')->paginate(6);
        }else{
            $query = $this->roule->query()
                          ->where('name','LIKE','%'.strtoupper($request->pesquisa.'%'));
            $roules = $query->orderByDesc('id')->paginate(6);
        }
        return view('admin.roules.index',[
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
            'name' => ['required','max:30'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $data['id'] = $this->autoincRoule();
            $data['name'] = strtoupper($request->input('name'));
            $data['created_at'] = now();
            
            $roule = $this->roule->create($data);
            
            return response()->json([
                'status' => 200,
                'roule' => $roule,
                'message' => 'Registro gravado com sucesso!',
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
        $roule = $this->roule->find($id);
        return response()->json([
            'status' => 200,
            'roule' => $roule,
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
            'name' => ['required','max:30'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $roule = $this->roule->find($id);
            if($roule){            
            $data['name'] = strtoupper($request->input('name'));
            $data['updated_at'] = now();
            $roule->update($data);
            return response()->json([
                'status' => 200,
                'roule' => $roule,
                'message' => 'Registro atualizado com sucesso!',
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
        $roule = $this->roule->find($id);
        $authorizations = $roule->authorization;
        if($authorizations->count()){
            return response()->json([
                'status' => 400,
                'message' => 'Este registro não pode ser excluído! Pois há outros que dependem dele.',
            ]);
        }else{
            $roule->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Registro excluído com sucesso!',
            ]);
        }
    }

    protected function autoincRoule(){
        $roule = $this->roule->orderByDesc('id')->first();
        if($roule){
            $codigo = $roule->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }


    public function listAuthorizations(int $id){
        $roule = $this->roule->find($id);
        $modope = $this->modope->with('module','operation')->get();
        $authorizations = $this->authorization->whereRoules_id($id)->get();       
        if($modope->count()){
            return response()->json([
                'status' => 200,
                'modope' => $modope,
                'roule' => $roule,
                'authorizations' => $authorizations,
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'roule' => $roule,
            ]);
        }

    }


    public function storeAuthorizations(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'permissoes' => ['required','array','min:1'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $roule = $this->roule->find($id);            
            $auths = $this->authorization->whereRoules_id($roule->id)->get();
            if($auths->count()){
                foreach ($auths as $aut) {
                   $a = $this->authorization->find($aut->id);
                   $a->delete();
                }
            }
            foreach ($request->permissoes as $permissao) {
                $modope = $this->modope->find($permissao);
                $data['id'] = $this->autoincAuthorization();
                $data['modope_id'] = $modope->id;
                $data['modope_module_id'] = $modope->module_id;
                $data['modope_operation_id'] = $modope->operation_id;
                $data['roules_id'] = $id;
                $data['created_at'] = now();
                $data['updated_at'] = now();
                
                $this->authorization->create($data);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Permissões autorizadas com sucesso!',
            ]);
        }
    }

    protected function autoincAuthorization(){
        $authorization = $this->authorization->orderByDesc('id')->first();
        if($authorization){
            $codigo = $authorization->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }

    

}

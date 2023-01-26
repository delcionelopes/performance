<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
  private $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(is_null($request->pesquisa)){
            $modules = $this->module->orderByDesc('id')->paginate(6);
        }else{
            $query = $this->module->query()
                          ->where('name','LIKE','%'.strtoupper($request->pesquisa).'%');
            $modules = $query->orderByDesc('id')->paginate(6);
        }
        $operations = Operation::all();
        return view('admin.modules.index',[
            'modules' => $modules,
            'operations' => $operations,
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
            'icone' => 'required',         
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $data['id'] = $this->autoincModule();
            $data['name'] = strtoupper($request->input('name'));
            $data['icone'] = $request->input('icone');
            $data['created_at'] = now();
            
            $module = $this->module->create($data);
          
            return response()->json([
                'status' => 200,
                'module' => $module,
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
        $module = $this->module->find($id);      
        return response()->json([
            'status' => 200,
            'module' => $module,          
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
            'icone' => 'required',            
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $module = $this->module->find($id);
            if($module){            
            $data['name'] = strtoupper($request->input('name'));
            $data['icone'] = $request->input('icone');
            $data['updated_at'] = now();
            
            $module->update($data);
            $mod = Module::find($id);
           
            return response()->json([
                'status' => 200,
                'module' => $mod,
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
        $module = $this->module->find($id);
        $operations = $module->operations;
        if($operations->count()){
            return response()->json([
                'status' => 400,
                'message' => 'Este registro não pode ser excluído! Pois há outros que dependem dele.',
            ]);
        }else{
            $module->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Registro excluído com sucesso!',
            ]);
        }
    }

    public function listOperations(int $id){
        $module = $this->module->find($id);
        $operations = $module->operations;
        return response()->json([
            'status' => 200,
            'module' => $module,
            'operations' => $operations,
        ]);
    }

    public function storeOperations(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'operacoes' => ['required','array','min:1'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{

            $module = $this->module->find($id);
            $module->operations()->sync($request->operacoes);  
                     
            return response()->json([
                'status' => 200,
                'message' => 'Operações vinculadas com sucesso!',
            ]);
        }
    }

    protected function autoincModule(){
        $module = $this->module->orderByDesc('id')->first();
        if($module){
            $codigo = $module->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OperationController extends Controller
{
    private $operation;

    public function __construct(Operation $operation)
    {
        $this->operation = $operation;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        if(is_null($request->pesquisa)){
            $operations = $this->operation->orderByDesc('id')->paginate(6);
        }else{
            $query = $this->operation->query()
                          ->where('name','LIKE','%'.strtoupper($request->pesquisa).'%');
            $operations = $query->orderByDesc('id')->paginate(6);
        }
        return view('admin.operations.index',[
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
            $data['id'] = $this->autoincOperation();
            $data['name'] = strtoupper($request->input('name'));
            $data['icone'] = $request->input('icone');
            $data['created_at'] = now();
            
            $operation = $this->operation->create($data);
            return response()->json([
                'status' => 200,
                'operation' => $operation,
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
        $operation = $this->operation->find($id);
        return response()->json([
            'status' => 200,
            'operation' => $operation,
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
            $operation = $this->operation->find($id);
            if($operation){            
            $data['name'] = strtoupper($request->input('name'));
            $data['icone'] = $request->input('icone');
            $data['updated_at'] = now();
            
            $operation->update($data);
            $ope = Operation::find($id);
            return response()->json([
                'status' => 200,
                'operation' => $ope,
                'message' => 'Registro atualizado com sucesso!',
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Registro n??o localizado!',
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
        $operation = $this->operation->find($id);
        $modules = $operation->modules;
        if($modules->count()){
            return response()->json([
                'status' => 400,
                'message' => 'Este registro n??o pode ser exclu??do! Pois h?? outros que dependem dele.',
            ]);
        }else{
            $operation->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Registro exclu??do com sucesso!',
            ]);
        }
    }

    protected function autoincOperation(){
        $operation = $this->operation->orderByDesc('id')->first();
        if($operation){
            $codigo = $operation->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }
}

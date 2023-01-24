<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RouleController extends Controller
{
    private $roule;

    public function __construct(Roule $roule)
    {
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
}

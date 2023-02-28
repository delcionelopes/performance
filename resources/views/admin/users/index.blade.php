@extends('layouts.master')

@section('content')

<!--AddUserModal-->
<div class="modal fade animate__animated animate__bounce animate__faster" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar navbar-dark bg-primary">
                <h5 class="modal-title" id="titleModalLabel" style="color: white;">Adicionar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <form id="addform" name="addform" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <ul id="saveform_errList"></ul>                
            <div class="card-body">
              <div class="card p-3" style="background-image: url('/storage/banner-docs.jpg')">
                <div class="d-flex align-items-center">
                    <!--arquivo de imagem-->
                 {{--    <div class="form-group mb-3">                                                
                       <div class="image">                            
                            <img src="{{asset('storage/user.png')}}" class="addimgfoto rounded-circle" width="100" >     
                        </div>
                       <label for="">Foto</label>                        
                       <span class="btn btn-none fileinput-button"><i class="fas fa-plus"></i>                          
                          <input id="addimagem" type="file" name="imagem" class="btn btn-primary" accept="image/x-png,image/gif,image/jpeg">
                       </span>                       
                     </div>   --}}
                     <!--arquivo de imagem--> 
                </div>
              </div>
            </div>
                    <div class="form-group mb-3">
                        <label for="">Nome</label>
                        <input type="text" class="name form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">e-Mail</label>
                        <input type="text" class="email form-control">
                    </div>                                        
                    <div class="form-group mb-3">
                        <label for="">Senha</label>
                        <input type="password" class="password form-control">
                    </div>                                        
                    <div class="form-group mb-3">
                        <label for="add_enabled">
                        <input type="checkbox" id="add_enabled" name="add_enabled" class="enabled checkbox" checked>
                        Ativo
                        </label>
                    </div>
                    <div class="form-group mb-3">
                    <label for="">Regra & Perfil</label>
                    <select name="add_roule_id" id="add_roule_id" class="roules custom-select">
                            {{-- @foreach($roules as $roule)
                            <option value="{{$roule->id}}">{{$roule->name}}</option>
                            @endforeach --}}
                        </select>
                    </div>                                                              
            <div class="modal-footer">
                <button type="button" class="btn btn-default addFechar_btn" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary add_user"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
            </div>
            </form>
            </div>
        </div>

    </div>
</div>

<!--Fim AddUserModal-->
<!--EditUserModal-->
<div class="modal fade animate__animated animate__bounce animate__faster" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar navbar-dark bg-primary">
                <h5 class="modal-title" id="titleModalLabel" style="color: white;">Editar e atualizar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>
            </div>
            <div class="modal-body form-horizontal">
                <form id="editform" name="editfom" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <ul id="updateform_errList"></ul>
            <div class="card-body">
              <div class="card p-3" style="background-image: url('/storage/banner-docs.jpg')">
                <div class="d-flex align-items-center">
                    <!--arquivo de imagem-->
                {{--     <div class="form-group mb-3">                                                
                       <div class="image">                            
                            <img src="{{asset('storage/user.png')}}" class="editimgfoto rounded-circle" width="100" >     
                        </div>
                       <label for="">Foto</label>                        
                       <span class="btn btn-none fileinput-button"><i class="fas fa-plus"></i>                          
                          <input id="upimagem" type="file" name="imagem" class="btn btn-primary" accept="image/x-png,image/gif,image/jpeg">
                       </span>                       
                     </div> --}}  
                     <!--arquivo de imagem--> 
                </div>
              </div>
            </div>
                    <input type="hidden" id="edit_user_id">
                    <div class="form-group mb-3">
                        <label for="">Nome</label>
                        <input type="text" id="edit_name" class="name form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">e-Mail</label>
                        <input type="text" id="edit_email" class="email form-control">
                    </div>                    
                    <div class="form-group mb-3">
                        <label for="">Senha</label>
                        <input type="password" id="edit_password" class="password form-control">
                    </div>                                        
                    <div class="form-group mb-3">
                        <label for="edit_enabled">
                        <input type="checkbox" id="edit_enabled" name="edit_enabled" class="enabled checkbox">
                        Ativo
                        </label>
                    </div>     
                    <div class="form-group mb-3">
                    <label for="">Regra & Perfil</label>
                    <select name="edit_roule_id" id="edit_roule_id" class="roules custom-select">
                            {{-- @foreach($roules as $roule)
                            <option value="{{$roule->id}}">{{$roule->name}}</option>
                            @endforeach --}}
                        </select>
                    </div>                        
            <div class="modal-footer">
                <button type="button" class="btn btn-default editFechar_btn" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary update_user"><img id="imgedit" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Atualizar</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!--Fim EditUserModal-->
<!--Início Index-->
<div class="container-fluid py-5">
    <div id="success_message"></div>
    <div class="row">
        <div class="card-body">
            <section class="border p-4 mb-4 d-flex align-items-left">
                <form action="{{route('admin.users.index')}}" class="form-search" method="GET">
                    <div class="col-sm-12">
                        <div class="input-group rounded">
                            <input type="text" name="pesquisa" class="form-control rounded float-left" placeholder="Nome do usuário" aria-label="Search" aria-describedby="search-addon">
                            <button type="submit" class="input-group-text border-0" id="search-addon" style="background: transparent;border: none;">
                                <i class="fas fa-search"></i>
                            </button>
                            <button type="button" class="AddUserModal_btn input-group-text border-0 animate__animated animate__bounce" style="background: transparent;border: none;">
                                 <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </section>
            <table class="table table-hover">
                <thead class="sidebar-dark-primary elevation-4" style="color: white">
                    <tr>                      
                        <th scope="col">USUÁRIOS</th>
                        {{-- <th scope="col">PERFIL</th>                       
                        <th scope="col">MODIFICADO EM</th> --}}
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody id="lista_users">
                    <tr id="novo" style="display:none;"></tr>
                    @if($users)
                    @foreach($users as $user)
                    <tr id="user{{$user['id']}}">                        
                        <td>{{$user['name']}}</td>  
                        {{-- <td></td>                       --}}
                       {{--  @if($user->enabled)
                        <td id="ativo{{$user->id}}"><button type="button" data-id="{{$user->id}}" data-ativo="0" class="ativo_user fas fa-thumbs-up" style="background: transparent; color: green; border: none;"></button></td>                        
                        @else
                        <td id="ativo{{$user->id}}"><button type="button" data-id="{{$user->id}}" data-ativo="1" class="ativo_user fas fa-thumbs-down" style="background: transparent; color: red; border: none;"></button></td>
                        @endif --}}
                       {{--  @if(is_null($user->updated_at))
                        <td></td>
                        @else
                        <td>{{date('d/m/Y H:i:s',strtotime($user->updated_at))}}</td>
                        @endif --}}
                        <td>
                            <div class="btn-group">
                                <button type="button" data-id="{{$user['id']}}" class="edit_user_btn fas fa-edit" style="background: transparent;border: none;"></button>
                                <button type="button" data-id="{{$user['id']}}" data-nomeusuario="{{$user['name']}}" class="delete_user_btn fas fa-trash" style="background: transparent;border: none;"></button>
                            </div>
                        </td>
                    </tr>
                    {{-- @empty
                    <tr id="nadaencontrado">
                        <td colspan="4">Nada Encontrado!</td>
                    </tr> --}}
                    @endforeach
                    @else
                     <tr id="nadaencontrado">
                        <td colspan="4">Nada Encontrado!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="col-12">
                {{-- {{$users->links()}} --}}
            </div>            
        </div>
    </div>
</div>
<!--Fim Index-->
@endsection



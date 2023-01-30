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
                    <div class="form-group mb-3">                                                
                       <div class="image">                            
                            <img src="{{asset('storage/user.png')}}" class="addimgfoto rounded-circle" width="100" >     
                        </div>
                       <label for="">Foto</label>                        
                       <span class="btn btn-none fileinput-button"><i class="fas fa-plus"></i>                          
                          <input id="addimagem" type="file" name="imagem" class="btn btn-primary" accept="image/x-png,image/gif,image/jpeg">
                       </span>                       
                     </div>  
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
                            @foreach($roules as $roule)
                            <option value="{{$roule->id}}">{{$roule->name}}</option>
                            @endforeach
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
                    <div class="form-group mb-3">                                                
                       <div class="image">                            
                            <img src="{{asset('storage/user.png')}}" class="editimgfoto rounded-circle" width="100" >     
                        </div>
                       <label for="">Foto</label>                        
                       <span class="btn btn-none fileinput-button"><i class="fas fa-plus"></i>                          
                          <input id="upimagem" type="file" name="imagem" class="btn btn-primary" accept="image/x-png,image/gif,image/jpeg">
                       </span>                       
                     </div>  
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
                            @foreach($roules as $roule)
                            <option value="{{$roule->id}}">{{$roule->name}}</option>
                            @endforeach
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
                        <th scope="col">AVATAR</th>
                        <th scope="col">USUÁRIOS</th>
                        <th scope="col">PERFIL</th>                        
                        <th scope="col">ATIVO</th>
                        <th scope="col">MODIFICADO EM</th>
                        <th scope="col">AÇÕES</th>
                    </tr>
                </thead>
                <tbody id="lista_users">
                    <tr id="novo" style="display:none;"></tr>
                    @forelse($users as $user)
                    <tr id="user{{$user->id}}">
                        @if($user->avatar)
                                <td><img src="{{asset('storage/'.$user->avatar)}}" alt="Foto de {{$user->name}}"
                                class="rounded-circle" width="30">                                           
                                </td>
                                @else
                                <td><img src="{{asset('storage/user.png')}}" alt="user"
                                class="rounded-circle" width="30"></td>
                        @endif
                        <td>{{$user->name}}</td>  
                        <td>{{$user->roule->name}}</td>                      
                        @if($user->enabled)
                        <td id="ativo{{$user->id}}"><button type="button" data-id="{{$user->id}}" data-ativo="0" class="ativo_user fas fa-thumbs-up" style="background: transparent; color: green; border: none;"></button></td>                        
                        @else
                        <td id="ativo{{$user->id}}"><button type="button" data-id="{{$user->id}}" data-ativo="1" class="ativo_user fas fa-thumbs-down" style="background: transparent; color: red; border: none;"></button></td>
                        @endif
                        @if(is_null($user->updated_at))
                        <td></td>
                        @else
                        <td>{{date('d/m/Y H:i:s',strtotime($user->updated_at))}}</td>
                        @endif
                        <td>
                            <div class="btn-group">
                                <button type="button" data-id="{{$user->id}}" class="edit_user_btn fas fa-edit" style="background: transparent;border: none;"></button>
                                <button type="button" data-id="{{$user->id}}" data-nomeusuario="{{$user->name}}" class="delete_user_btn fas fa-trash" style="background: transparent;border: none;"></button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr id="nadaencontrado">
                        <td colspan="4">Nada Encontrado!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="col-12">
                {{$users->links()}}
            </div>            
        </div>
    </div>
</div>
<!--Fim Index-->
@endsection

@section('scripts')
<script type="text/javascript">

//Início escopo geral
$(document).ready(function(){
    //inicio delete usuário
    $(document).on('click','.delete_user_btn',function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var nomeusuario = $(this).data("nomeusuario");
        var resposta = confirm(nomeusuario+". Deseja excluir?");

        if(resposta==true){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/admin/users/user-delete/'+id,
                type:'POST',
                dataType:'json',
                data:{
                    "id":id,
                    "_method":'DELETE',
                },                
                success:function(response){
                    if(response.status==200){
                        //remove a linha correspondente
                        $("#user"+id).remove();
                        $('#success_message').replaceWith('<div id="success_message"></div>');
                        $('#success_message').addClass("alert alert-success");
                        $('#success_message').text(response.message);
                    }
                }
            });
        }
    });
    //fim delete usuário
//Início chamada EditUserModal
$('#EditUserModal').on('shown.bs.modal',function(){
        $('.name').focus();
    });
    $(document).on('click','.edit_user_btn',function(e){
        e.preventDefault();
        var id = $(this).data("id");
        $('#editform').trigger('reset');
        $('#EditUserModal').modal('show');
        $('.editimgfoto').replaceWith('<img src="{{asset('storage/user.png')}}" class="editimgfoto rounded-circle" width="100">');

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'/admin/users/user-edit/'+id,
            success:function(response){
                if(response.status==200){  
                    var link = "{{asset('')}}"+"storage/";                  
                    $('#edit_user_id').val(response.user.id);
                    $('.name').val(response.user.name);                   
                    $('.email').val(response.user.email);
                    $('.roules').val(response.user.roules_id);
                    $('.editimgfoto').attr('src',link+response.user.avatar);
                    if(response.user.enabled==1){
                    $('.enabled').attr('checked',true);
                    }else{
                    $('.enabled').attr('checked',false);
                    }
                                                  
                }
            }
        });
    });

      $('select[name="edit_roule_id"]').on('change',function(){
            var editoptroule = this.value;
                      $('#edit_roule_id option')
                      .removeAttr('selected')
                      .filter('[value='+editoptroule+']')
                      .attr('selected',true);
        });   
    //Fim chamada EditUserModal
    //Início processo update do usuário
    $(document).on('click','.update_user',function(e){
        e.preventDefault();
        var loading = $('#imgedit');
            loading.show();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
        
        var ativo = 0;                 
        $("#edit_enabled:checked").each(function(){ativo = 1;});                     
        var id = $('#edit_user_id').val();
        var data = new FormData();
            data.append('name',$('#edit_name').val());
            data.append('email',$('#edit_email').val());
            data.append('password',$('#edit_password').val());          
            data.append('enabled',ativo),           
            data.append('profile',$('#edit_roule_id').val()),
            data.append('imagem',$('#upimagem')[0].files[0]);
            data.append('_enctype','multipart/form-data');
            data.append('_token',CSRF_TOKEN);
            data.append('_method','put');               
        $.ajax({
            type:'POST',            
            dataType:'json',            
            url:'/admin/users/user-update/'+id,
            data:data,
            cache: false,
            processData: false,
            contentType: false, 
            success:function(response){
                if(response.status==400){
                    //erros
                    $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');
                    $('#updateform_errList').addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $('#updateform_errList').append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else if(response.status==404){
                    //Não localizado
                    $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');
                    $('#success_message').replaceWith('<div id="success_message"></div>');
                    $('#success_message').addClass('alert alert-warning');
                    $('#success_message').text(response.message);
                    loading.hide();
                }else{
                    //Êxito na operação
                    $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');
                    $('#success_message').replaceWith('<div id="success_message"></div>');
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    loading.hide();
                    $('#editform').trigger('reset');
                    $('#EditUserModal').modal('hide');
                    //montando a <tr> identificada na tabela html                    
                    var dataatualizacao = new Date(response.user.updated_at);
                        dataatualizacao = dataatualizacao.toLocaleString("pt-BR");
                    if(dataatualizacao=="31/12/1969 21:00:00"){
                        dataatualizacao="";
                    }
                    var limita1 = "";
                    var limita2 = "";
                    var limita3 = "";
                    var limita4 = "";
                    var link = "{{asset('')}}"+"storage/";
                    var linkuser = "{{asset('')}}"+"storage/user.png";
                   
                        limita1 = '<tr id="user'+response.user.id+'">';
                                if(response.user.avatar){                                
                                limita1 = limita1 + '<td><img src="'+link+response.user.avatar+'" alt="Foto de '+response.user.name+'" class="rounded-circle" width="30">\
                                </td>';
                                }else{
                                limita1 = limita1 + '<td><img src="'+linkuser+'" alt="user" class="rounded-circle" width="30"></td>';
                                }
                                limita1 = limita1 + '<td>'+response.user.name+'</td>\
                                <td>'+response.roule.name+'</td>';
                        
                        if(response.user.enabled==1){
                        limita2 = '<td id="ativo'+response.user.id+'"><button type="button" \
                                   data-id="'+response.user.id+'" \
                                   data-ativo="0" \
                                   class="ativo_user fas fa-thumbs-up" \
                                   style="background: transparent; color: green; border: none;">\
                                   </button></td>';
                        }else{
                        limita3 = '<td id="ativo'+response.user.id+'"><button type="button" \
                                  data-id="'+response.user.id+'" \
                                  data-ativo="1" \
                                  class="ativo_user fas fa-thumbs-down" \
                                  style="background: transparent; color: red; border: none;">\
                                  </button></td>';
                        }
                        limita4 = '<td>'+dataatualizacao+'</td>\
                                <td><div class="btn-group">\
                                <button type="button" data-id="'+response.user.id+'"\
                                 class="edit_user_btn fas fa-edit"\
                                 style="background:transparent;border:none"></button>\
                                <button type="button" data-id="'+response.user.id+'"\
                                 data-nomeusuario="'+response.user.name+'" \
                                 class="delete_user_btn fas fa-trash" \
                                 style="background:transparent;border:none;"></button>\
                                </div></td>\
                                </tr>';                                             
                    var linha = limita1+limita2+limita3+limita4;            
                    $("#user"+id).replaceWith(linha);
                }
            }
        });
    });   
    //Fim processo update do usuario
    //Chamar AddUserModal
    $('#AddUserModal').on('shown.bs.modal',function(){
        $('.name').focus();
    });
    $(document).on('click','.AddUserModal_btn',function(e){
        e.preventDefault();        
        $('#addform').trigger('reset');
        $('#AddUserModal').modal('show');
    });
    //Fim chamar AddUserModal
    //Enviar usuário para o controller
    $('select[name="add_roule_id"]').on('change',function(){
            var addoptroule = this.value;
                      $('#add_roule_id option')
                      .removeAttr('selected')
                      .filter('[value='+addoptroule+']')
                      .attr('selected',true);
        });

    $(document).on('click','.add_user',function(e){
        e.preventDefault();
        var loading = $('#imgadd');        
            loading.show();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");        
        var ativo = 0;        
        $("#add_enabled:checked").each(function(){ativo = 1;});                     
        var data = new FormData();        
            data.append('name',$('.name').val());
            data.append('email',$('.email').val());
            data.append('password',$('.password').val());
            data.append('enabled',ativo);    
            data.append('profile',$('#add_roule_id').val());
            data.append('imagem',$('#addimagem')[0].files[0]);
            data.append('_enctype','multipart/form-data');
            data.append('_token',CSRF_TOKEN);
            data.append('_method','put');
        $.ajax({
            url:'/admin/users/user-store',
            type:'POST',
            dataType:'json',
            data:data,            
            cache: false,
            processData: false,
            contentType: false, 
            success:function(response){
                if(response.status==400){
                    //erros
                    $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');
                    $('#saveform_errList').addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $('#saveform_errList').append('<li>'+err_values+'</li>');
                    });
                    loading.hide();                    
                }else{
                    //sucesso
                    $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');
                    $('#success_message').replaceWith('<div id="success_message"></div>');
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    loading.hide();                    
                    $('#addform').trigger('reset');
                    $('#AddUserModal').modal('hide');
                     //montando a <tr> identificada na tabela html                    
                     var dataatualizacao = new Date(response.user.updated_at);
                         dataatualizacao = dataatualizacao.toLocaleString("pt-BR");
                    if(dataatualizacao=="31/12/1969 21:00:00"){
                        dataatualizacao="";
                    }
                    var link = "{{asset('')}}"+"storage/";
                    var linkuser = "{{asset('')}}"+"storage/user.png";
                    var limita1 = "";                    
                    var limita2 = "";
                    var limita3 = "";
                    var limita4 = "";
                        limita1 = '<tr id="novo" style="display:none;"></tr>\
                                <tr id="user'+response.user.id+'">';
                                if(response.user.avatar){
                                limita1 = limita1 + '<td><img src="'+link+response.user.avatar+'" alt="Foto de '+response.user.name+'" class="rounded-circle" width="30">\
                                </td>';
                                }else{
                                limita1 = limita1 + '<td><img src="'+linkuser+'" alt="user" class="rounded-circle" width="30"></td>';
                                }
                                limita1 = limita1 + '<td>'+response.user.name+'</td>\
                                <td>'+response.roule.name+'</td>';                        
                                                  
                        if(response.user.enabled==1){
                        limita2 = '<td id="ativo'+response.user.id+'"><button type="button" \
                                   data-id="'+response.user.id+'" \
                                   data-ativo="0" \
                                   class="ativo_user fas fa-thumbs-up" \
                                   style="background: transparent; color: green; border: none;">\
                                   </button></td>';
                        }else{
                        limita3 = '<td id="ativo'+response.user.id+'"><button type="button" \
                                  data-id="'+response.user.id+'" \
                                  data-ativo="1" \
                                  class="ativo_user fas fa-thumbs-down" \
                                  style="background: transparent; color: red; border: none;">\
                                  </button></td>';
                        }
                        limita4 = '<td>'+dataatualizacao+'</td>\
                                <td><div class="btn-group">\
                                <button type="button" data-id="'+response.user.id+'" \
                                class="edit_user_btn fas fa-edit" \
                                style="background:transparent;border:none"></button>\
                                <button type="button" data-id="'+response.user.id+'" \
                                data-nomeusuario="'+response.user.name+'" \
                                class="delete_user_btn fas fa-trash" \
                                style="background:transparent;border:none;"></button>\
                                </div></td>\
                                </tr>';                                             
                    var linha = limita1+limita2+limita3+limita4;
                    if(!$('#nadaencontrado').html()=="")
                    {
                        $('#nadaencontrado').remove();
                    }
                    $('#novo').replaceWith(linha);
                }                
            }
        });
    });
    //Fim Enviar usuário para o controller

    //inicio ativa usuario
    $(document).on('click','.ativo_user',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
        var id = $(this).data("id");
        var ativo = $(this).data("ativo");
        var data = {
            'ativo':ativo,
            '_method':'PUT',
            '_token':CSRF_TOKEN,
        }
         
            $.ajax({
                type: 'post',
                dataType: 'json',
                data:data,
                url:'/admin/users/user-ativo/'+id,
                success: function(response){
                    if(response.status==200){                                                                               
                        var limita1 = "";
                        var limita2 = "";                        
                        if(response.user.enabled==1){
                        limita1 = '<td id="ativo'+response.user.id+'"><button type="button" \
                                   data-id="'+response.user.id+'" \
                                   data-ativo="0" \
                                   class="ativo_user fas fa-thumbs-up" \
                                   style="background: transparent; color: green; border: none;">\
                                   </button></td>';
                        }else{
                        limita1 = '<td id="ativo'+response.user.id+'"><button type="button" \
                                  data-id="'+response.user.id+'" \
                                  data-ativo="1" \
                                  class="ativo_user fas fa-thumbs-down" \
                                  style="background: transparent; color: red; border: none;">\
                                  </button></td>';
                        }
                        var celula = limita1+limita2;
                        $('#ativo'+id).replaceWith(celula);        
                    }
                }
            });
    });
    //fim ativa usuario

     //upload da foto temporária
         $(document).on('change','#addimagem',function(){  
          
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var fd = new FormData();
            var files = $(this)[0].files;                      

            if(files.length > 0){
            // Append data 
            fd.append('imagem',$(this)[0].files[0]);      
            fd.append('_token',CSRF_TOKEN);
            fd.append('_enctype','multipart/form-data');
            fd.append('_method','put');      
            
        $.ajax({                      
                type: 'POST',                             
                url:'/admin/users/imgtemp-upload',                
                dataType: 'json',            
                data: fd,
                cache: false,
                processData: false,
                contentType: false,                                                                                     
                success: function(response){                              
                    if(response.status==200){
                        var arq = response.filepath; 
                            arq = arq.toString();                  ;
                        var linkimagem = '{{asset('')}}'+arq;                        
                        var imagemnova = '<img src="'+linkimagem+'" class="addimgfoto rounded-circle" width="100" >';                        
                        $(".addimgfoto").replaceWith(imagemnova);
                    }   
                }                                  
            });
        }
        });   

         $(document).on('change','#upimagem',function(){  
          
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var fd = new FormData();
            var files = $(this)[0].files;                      

            if(files.length > 0){
            // Append data 
            fd.append('imagem',$(this)[0].files[0]);      
            fd.append('_token',CSRF_TOKEN);
            fd.append('_enctype','multipart/form-data');
            fd.append('_method','put');      
            
        $.ajax({                      
                type: 'POST',                             
                url:'/admin/users/imgtemp-upload',                
                dataType: 'json',            
                data: fd,
                cache: false,
                processData: false,
                contentType: false,                                                                                     
                success: function(response){                              
                    if(response.status==200){                                                                       
                        var arq = response.filepath; 
                            arq = arq.toString();                  ;
                        var linkimagem = '{{asset('')}}'+arq;                        
                        var imagemnova = '<img src="'+linkimagem+'" class="editimgfoto rounded-circle" width="100" >';                        
                        $(".editimgfoto").replaceWith(imagemnova);
                    }   
                }                                  
            });
        }
        });   


        $(document).on('click','.addFechar_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var files = $('#addimagem')[0].files;                      

        if(files.length > 0){
        var data = new FormData();
            data.append('imagem',$('#addimagem')[0].files[0]);
            data.append('_token',CSRF_TOKEN);
            data.append('_enctype','multipart/form-data');
            data.append('_method','delete');   
             $.ajax({                      
                type: 'POST',                             
                url:'/admin/users/delete-img',                
                dataType: 'json',            
                data: data,
                cache: false,
                processData: false,
                contentType: false,                                                                                     
                success: function(response){                              
                    if(response.status==200){
                    $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');                         
                    location.replace('/admin/users/index');
                } 
                }                                  
            });

        }else{
            //location.replace('/admin/users/index');
        }

    });

    $(document).on('click','.editFechar_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var files = $('#upimagem')[0].files;                      

        if(files.length > 0){
        var data = new FormData();
            data.append('imagem',$('#upimagem')[0].files[0]);
            data.append('_token',CSRF_TOKEN);
            data.append('_enctype','multipart/form-data');
            data.append('_method','delete');   
             $.ajax({                      
                type: 'POST',                             
                url:'/admin/users/delete-img',                
                dataType: 'json',            
                data: data,
                cache: false,
                processData: false,
                contentType: false,                                                                                     
                success: function(response){                              
                    if(response.status==200){
                    $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');                         
                    location.replace('/admin/users/index');
                } 
                }                                  
            });

        }else{
            //location.replace('/admin/users/index');
        }

    });
    //fim upload da foto temporária

});
//Fim escopo geral
</script>
@endsection


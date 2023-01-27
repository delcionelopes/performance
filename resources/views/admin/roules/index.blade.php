@extends('layouts.master')

@section('content')

<!--AddRouleModal-->

<div class="modal fade animate__animated animate__bounce animate__faster" id="AddRouleModal" tabindex="-1" role="dialog" aria-labelledby="addtitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-primary">
                <h5 class="modal-title" id="addtitleModalLabel" style="color: white;">Adicionar Regras/Perfis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="addmyform" name="addmyform" class="form-horizontal" role="form">                 
                <ul id="saveform_errList"></ul>                   
                <div class="form-group mb-3">
                    <label for="">Nome</label>
                    <input type="text" class="name form-control">
                </div>                
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary add_roule"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
            </div>
        </div>
    </div>

</div>
<!--End AddRouleModal-->

<!--EditRouleModal-->

<div class="modal fade animate__animated animate__bounce animate__faster" id="EditRouleModal" tabindex="-1" role="dialog" aria-labelledby="edittitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-primary">
                <h5 class="modal-title" id="edittitleModalLabel" style="color: white;">Editar e atualizar Regras/Perfis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="editmyform" name="editmyform" class="form-horizontal" role="form">                
                <ul id="updateform_errList"></ul>               
                <input type="hidden" id="edit_roule_id">
                <div class="form-group mb-3">
                    <label for="">Nome</label>
                    <input type="text" id="edit_name" class="name form-control">
                </div>                     
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary update_roule"><img id="imgedit" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Atualizar</button>
            </div>
        </div>
    </div>
</div>
<!--End EditRouleModal -->

<!--Begin ListAuthorizationModal-->

<div class="modal fade animate__animated animate__bounce" id="ListAuthorizationModal" tabindex="-1" role="dialog" aria-labelledby="listtitleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-primary">
                <h5 class="modal-title" id="listtitleModalLabel" style="color: white;">Roule: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="listform" name="listform" class="form-horizontal" role="form">                
                <ul id="listform_errList"></ul>               
                <input type="hidden" id="list_roule_id">
                <div class="card">
                     <div class="card-body" id="cardauthorizations">                            
                     </div>
                </div>                  
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary update_listauthorization"><img id="imglist" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!--End ListAuthorizationModal -->

<!--index-->
{{-- @auth
@if(!(auth()->user()->inativo)) --}}
<div class="container-fluid py-5">   
    <div id="success_message"></div>    
    <section class="border p-4 mb-4 d-flex align-items-left">    
    <form action="{{route('admin.roules.index')}}" class="form-search" method="GET">
        <div class="col-sm-12">
            <div class="input-group rounded">            
            <input type="text" name="pesquisa" class="form-control rounded float-left" placeholder="nome do perfil" aria-label="Search"
            aria-describedby="search-addon">
            <button type="submit" class="pesquisa_btn input-group-text border-0" id="search-addon" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="bottom" data-toggle="popover" title="Pesquisa<br>Informe e tecle ENTER">
                <i class="fas fa-search"></i>
            </button>        
            <button type="button" class="AddRouleModal_btn input-group-text border-0 animate__animated animate__bounce" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="top" data-toggle="popover" title="Novo registro">
                <i class="fas fa-plus"></i>
            </button>                
            </div>            
            </div>        
            </form>                     
  
    </section>    
            
                    <table class="table table-hover">
                        <thead class="sidebar-dark-primary elevation-4" style="color: white">
                            <tr>                                
                                <th scope="col">REGRAS & PERFIS</th>
                                <th scope="col">AUTORIZAÇÕES</th>                    
                                <th scope="col">AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody id="lista_roules">
                        <tr id="novo" style="display:none;"></tr>
                        @forelse($roules as $roule)
                            <tr id="regra{{$roule->id}}">                                
                                <th scope="row">{{$roule->name}}</th>
                                <td>
                                        <div class="btn-group">                                           
                                            <button type="button" data-id="{{$roule->id}}" data-name="{{$roule->name}}" class="list_authorizations_btn" style="background:transparent;border:none;"><i id="ico_list{{$roule->id}}" class="fas fa-list"></i><img id="img_list{{$roule->id}}" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"></button>
                                        </div>    
                                </td>
                                <td>                                    
                                        <div class="btn-group">                                           
                                            <button type="button" data-id="{{$roule->id}}" class="edit_roule fas fa-edit" style="background:transparent;border:none;"></button>
                                            <button type="button" data-id="{{$roule->id}}" data-name="{{$roule->name}}" class="delete_roule_btn fas fa-trash" style="background:transparent;border:none;"></button>
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
                    <div class="d-flex hover justify-content-center">
                    {{$roules->links()}}
                    </div>  
   
    </div>        
    
</div> 
{{-- @else 
  <i class="fas fa-lock"></i><b class="title"> USUÁRIO INATIVO OU NÃO LIBERADO! CONTACTE O ADMINISTRADOR.</b>
@endif
@endauth --}}
<!--End Index-->

@endsection
@section('scripts')

<script type="text/javascript">

$(document).ready(function(){        
    
        $(document).on('click','.delete_roule_btn',function(e){   ///inicio delete 
            e.preventDefault();           
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');   
            var id = $(this).data("id");            
            var nome = $(this).data("name");
            
            Swal.fire({
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                title:nome,
                text: "Deseja excluir?",
                imageUrl: '../../logoprodap.jpg',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'imagem do prodap',
                showCancelButton: true,
                confirmButtonText: 'Sim, prossiga!',                
                cancelButtonText: 'Não, cancelar!',                                 
             }).then((result)=>{
             if(result.isConfirmed){             
                $.ajax({
                    url: '/admin/roules/delete-roule/'+id,
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        'id': id,
                        '_method': 'DELETE',                    
                        '_token':CSRF_TOKEN,
                    },
                    success:function(response){
                        if(response.status==200){                        
                            //remove linha correspondente da tabela html
                            $("#regra"+id).remove();     
                            $('#success_message').replaceWith('<div id="success_message"></div>');                       
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);         
                        }else{
                            //Não pôde excluir por causa dos relacionamentos    
                            $('#success_message').replaceWith('<div id="success_message"></div>');                        
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);         
                        }
                    }
                });            
            }  
        });
      
        });  ///fim delete 
        //início da exibição do form
        $('#EditRouleModal').on('shown.bs.modal',function(){
            $('#edit_name').focus();
        });
        $(document).on('click','.edit_roule',function(e){  
            e.preventDefault();
            
            var id = $(this).data("id");                                   
            $('#editmyform').trigger('reset');
            $('#EditRouleModal').modal('show');          
            $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');      
    
            $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
            $.ajax({ 
                type: 'GET',             
                dataType: 'json',                                    
                url: '/admin/roules/edit-roule/'+id,                                
                success: function(response){           
                    if(response.status==200){                           
                        $('.name').val(response.roule.name);
                        $('#edit_roule_id').val(response.roule.id);                        
                    }      
                }
            });
    
        }); //fim da da exibição do form de edição
    
        $(document).on('click','.update_roule',function(e){ //inicio da atualização de registro
            e.preventDefault();
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            var loading = $('#imgedit');
                loading.show();
    
            var id = $('#edit_roule_id').val();        
    
            var data = {
                'name' : $('#edit_name').val(),               
                '_method':'PUT',
                '_token':CSRF_TOKEN,
            }
            
            $.ajax({     
                type: 'POST',                          
                data: data,
                dataType: 'json',    
                url: '/admin/roules/update-roule/'+id,         
                success: function(response){                                                    
                    if(response.status==400){
                        //erros
                        $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');
                        $('#updateform_errList').addClass('alert alert-danger');
                        $.each(response.errors,function(key,err_values){
                            $('#updateform_errList').append('<li>'+err_values+'</li>');
                        });
    
                        loading.hide();
    
                    } else if(response.status==404){
                        $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');    
                        $('#success_message').replaceWith('<div id="success_message"></div>');             
                        $('#success_message').addClass('alert alert-warning');
                        $('#success_message').text(response.message);
                        loading.hide();
    
                    } else {
                        $('#updateform_errList').replaceWith('<ul id="updateform_errList"></ul>');      
                        $('#success_message').replaceWith('<div id="success_message"></div>');                 
                        $('#success_message').addClass("alert alert-success");
                        $('#success_message').text(response.message);
                        loading.hide();
    
                        $('editmyform').trigger('reset');
                        $('#EditRouleModal').modal('hide');                  
                        
                        //atualizando a linha na tabela html                      
                            var link = "{{asset('')}}"+"storage/ajax-loader.gif"; 
                            var linha = '<tr id="regra'+response.roule.id+'">\
                                    <th scope="row">'+response.roule.name+'</th>\
                                    <td>\
                                        <div class="btn-group">\
                                            <button type="button" data-id="'+response.roule.id+'" data-name="'+response.roule.name+'" class="list_authorizations_btn" style="background:transparent;border:none;"><i id="ico_list'+response.roule.id+'" class="fas fa-list"></i><img id="img_list'+response.roule.id+'" src="'+link+'" style="display: none;" class="rounded-circle" width="20"></button>\
                                        </div>\
                                    </td>\
                                    <td><div class="btn-group">\
                                    <button type="button" data-id="'+response.roule.id+'" class="edit_roule fas fa-edit" style="background:transparent;border:none"></button>\
                                    <button type="button" data-id="'+response.roule.id+'" data-name="'+response.roule.name+'" class="delete_roule_btn fas fa-trash" style="background:transparent;border:none"></button>\
                                    </div></td>\
                                    </tr>';                             
                        $("#regra"+id).replaceWith(linha);                                                                                
    
                    }
                }
            });    
    
        
    
        }); //fim da atualização do registro
    
        //exibe form de adição de registro
        $('#AddRouleModal').on('shown.bs.modal',function(){
            $('.name').focus();
        });
        $(document).on('click','.AddRouleModal_btn',function(e){  //início da exibição do form
            e.preventDefault();       
            
            $('#addmyform').trigger('reset');
            $('#AddRouleModal').modal('show'); 
            $('#saveform_errList').html('<ul id="saveform_errList"></ul>');                       
    
        });
    
        //fim exibe form de adição de registro
    
        $(document).on('click','.add_roule',function(e){ //início da adição de Registro
            e.preventDefault();
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            var loading = $('#imgadd');
                loading.show();

            var data = {
                'name': $('.name').val(),
                '_method':'PUT',
                '_token':CSRF_TOKEN,
            } 
            
            $.ajax({
                type: 'POST',
                url: '/admin/roules/add-roule',
                data: data,
                dataType: 'json',
                success: function(response){
                    if(response.status==400){
                        $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors,function(key,err_values){
                            $('#saveform_errList').append('<li>'+err_values+'</li>');
                        });
                        loading.hide();
                    } else {
                        $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');     
                        $('#success_message').replaceWith('<div id="success_message"></div>');              
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);                                        

                        loading.hide();
                        $('#addmyform').trigger('reset');                    
                        $('#AddRouleModal').modal('hide');
    
                        //adiciona a linha na tabela html                      
                        var link = "{{asset('')}}"+"storage/ajax-loader.gif";    
                        var tupla = "";
                        var linha0 = "";
                        var linha1 = "";
                            linha0 = '<tr id="novo" style="display:none;"></tr>';
                            linha1 = '<tr id="regra'+response.roule.id+'">\
                                    <th scope="row">'+response.roule.name+'</th>\
                                    <td>\
                                        <div class="btn-group">\
                                            <button type="button" data-id="'+response.roule.id+'" data-name="'+response.roule.name+'" class="list_authorizations_btn" style="background:transparent;border:none;"><i id="ico_list'+response.roule.id+'" class="fas fa-list"></i><img id="img_list'+response.roule.id+'" src="'+link+'" style="display: none;" class="rounded-circle" width="20"></button>\
                                        </div>\
                                    </td>\
                                    <td><div class="btn-group">\
                                    <button type="button" data-id="'+response.roule.id+'" class="edit_roule fas fa-edit" style="background:transparent;border:none"></button>\
                                    <button type="button" data-id="'+response.roule.id+'" data-name="'+response.roule.name+'" class="delete_roule_btn fas fa-trash" style="background:transparent;border:none"></button>\
                                    </div></td>\
                                    </tr>';
                        if(!$('#nadaencontrado').html==""){
                            $('#nadaencontrado').remove();
                        }
                        tupla = linha0+linha1;                             
                        $("#novo").replaceWith(tupla);                                                     
                        
                    }
                    
                }
            });
    
        }); //Fim da adição de registro

        ///inicio lista
         $(document).on('click','.list_authorizations_btn',function(e){
            e.preventDefault();

            var id = $(this).data("id");
                                      
                     $('#ico_list'+id).replaceWith('<i id="ico_list'+id+'"></i>');
            var loading = $('#img_list'+id);
                loading.show();

            $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
            $.ajax({ 
                type: 'GET',             
                dataType: 'json',                                    
                url: '/admin/roules/list-authorizations/'+id,                                
                success: function(response){
                    if(response.status==200){
                       $('#listform_errList').replaceWith('<ul id="listform_errList"></ul>');     
                        $('#listtitleModalLabel').replaceWith('<h5 class="modal-title" id="listtitleModalLabel" style="color: white;">Regra: '+response.roule.name+'</h5>');
                        $('#cardauthorizations').replaceWith('<div class="card-body" id="cardauthorizations"></div>');                        
                        var limitacard = "";
                        var alfa = "";
                        var beta = "";
                        $.each(response.modope,function(key,modope){                            
                                alfa = '<div class="card-body" id="cardauthorizations'+modope.module_id+'">\
                                <fieldset>\
                                    <legend>'+modope.module.name+'</legend>\
                                    <div class="form-check" id="form-check-vinculo'+modope.module_id+'">\
                                    </div>\
                                </fieldset>\
                                </div>';
                                if(alfa!=beta){
                                limitacard = limitacard+
                                '<div class="card-body" id="cardauthorizations'+modope.module_id+'">\
                                <fieldset>\
                                    <legend>'+modope.module.name+'</legend>\
                                    <div class="form-check" id="form-check-vinculo'+modope.module_id+'">\
                                    </div>\
                                </fieldset>\
                                </div>';       
                                }
                                beta = '<div class="card-body" id="cardauthorizations'+modope.module_id+'">\
                                <fieldset>\
                                    <legend>'+modope.module.name+'</legend>\
                                    <div class="form-check" id="form-check-vinculo'+modope.module_id+'">\
                                    </div>\
                                </fieldset>\
                                </div>';                  
                        });
                        $('#cardauthorizations').append(limitacard);
                        
                        $.each(response.modope,function(key,modope){                        
                        $('#form-check-vinculo'+modope.module_id).append('<label class="form-check-label" for="check'+modope.id+'">\
                            <input type="checkbox" id="check'+modope.id+'" name="authorizations[]" value="'+modope.id+'" class="form-check-input">\
                            <i class="fas fa-'+modope.operation.icone+'"></i> '+modope.operation.name+'</label><br>');                           
                        });     
                        
                       
                        $("input[name='authorizations[]']").attr('checked',false);                        
                        $.each(response.authorizations,function(key,values){                                                        
                                $("#check"+values.modope_id).attr('checked',true);
                        });

                        

                        $('#listmyform').trigger('reset');                    
                        $('#ListAuthorizationModal').modal('show');                       

                        $('#listform_errList').replaceWith('<ul id="listform_errList"></ul>');   
                        $('#list_roule_id').val(id);
                        loading.hide();
                        $('#ico_list'+id).replaceWith('<i id="ico_list'+id+'" class="fas fa-list"></i>');
                          
                    }else{
                       var message = '<div class="card-body" id="cardauthorizations">\
                                <fieldset>\
                                    <legend>'+response.message+'</legend>\
                                </fieldset>\
                                </div>';
                        $('#cardauthorizations').replaceWith('<div class="card-body" id="cardauthorizations"></div>');
                        $('#cardauthorizations').append(message);
                        $('#listmyform').trigger('reset');
                        $('#ListAuthorizationModal').modal('show');                        

                        $('#listform_errList').replaceWith('<ul id="listform_errList"></ul>');   
                        $('#list_roule_id').val(id);
                        loading.hide();
                        $('#ico_list'+id).replaceWith('<i id="ico_list'+id+'" class="fas fa-list"></i>');
                    }
                }
            });
        });

        $(document).on('click','.update_listauthorization',function(e){
            e.preventDefault();
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var loading = $('#imglist');
                loading.show();
            var id = $('#list_roule_id').val();
            
            var authorizations = new Array;
                        $("input[name='authorizations[]']:checked").each(function(){                
                            authorizations.push($(this).val());
                        });   
            var data = {
                'id':id,
                'permissoes':authorizations,
                '_method':'PUT',
                '_token':CSRF_TOKEN,
            }
            
            $.ajax({
                url:'/admin/roules/store-authorizations/'+id,
                type:'POST',
                dataType:'json',
                data:data,
                success:function(response){
                    if(response.status==400){
                        $('#listform_errList').replaceWith('<ul id="listform_errList"></ul>');
                        $('#listform_errList').addClass('alert alert-danger');
                        $.each(response.errors,function(key,err_values){
                            $('#listform_errList').append('<li>'+err_values+'</li>');
                        });
                        loading.hide();
                    } else {
                        $('#listform_errList').replaceWith('<ul id="listform_errList"></ul>');     
                        $('#success_message').replaceWith('<div id="success_message"></div>');              
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);                                        
                        loading.hide();
                        $('#listmyform').trigger('reset');
                        $('#ListAuthorizationModal').modal('hide');
                    }
                }
            });
        }); 

        ///fim lista de autorizações
    
    }); ///Fim do escopo do script
    
    </script>
@stop
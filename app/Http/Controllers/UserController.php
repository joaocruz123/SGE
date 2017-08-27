<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Flash;

class UserController extends Controller
{
 

public function form_novo_usuario(){
    //carga el formulario para agregar un nuevo usuario
    $roles=Role::all();
    return view("formularios.form_novo_usuario")->with("roles",$roles);

}


public function form_novo_rol(){
    //carga el formulario para agregar un nuevo rol
    $roles=Role::all();
    return view("formularios.form_novo_rol")->with("roles",$roles);
}

public function form_novo_permiso(){
    //carga el formulario para agregar un nuevo permiso
     $roles=Role::all();
     $permisos=Permission::all();
    return view("formularios.form_novo_permiso")->with("roles",$roles)->with("permisos", $permisos);
}



public function listar_usuarios(){
    //presenta un listado de usuarios paginados de 100 en 100
	$usuarios=User::paginate(100);
	return view("user.listar_usuarios")->with("usuarios",$usuarios);
}





public function criar_usuario(Request $request){
    //crea un nuevo usuario en el sistema

	$reglas=[  'password' => 'required|min:8',
	             'email' => 'required|email|unique:users', ];
	 
	$mensajes=[  'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
	             'email.unique' => 'O email já se encontra registrado no sistema.', ];
	  
	$validator = Validator::make( $request->all(),$reglas,$mensajes );
	if( $validator->fails() ){ 
      Flash::error('Erro de validação de Usuário.');
	  	return redirect(url('/listar_usuarios'))
	  	       ->withErrors($validator->errors());         
	}

	$usuario=new User;
	$usuario->name=strtoupper( $request->input("nombres")." ".$request->input("apellidos") ) ;
	$usuario->nombres=strtoupper( $request->input("nombres") ) ;
    $usuario->apellidos=strtoupper( $request->input("apellidos") ) ;
	$usuario->telefono=$request->input("telefono");
	$usuario->email=$request->input("email");
	$usuario->password= bcrypt( $request->input("password") ); 
 
            
    if($usuario->save())
    {
      Flash::success('Usuário criado com sucesso!');
      return redirect(url('/form_novo_usuario'));
    }
    else
    {
      Flash::error('Erro ao criar usuário.');
      return redirect(url('/form_novo_usuario'));
    }

}



public function criar_rol(Request $request){

   $rol=new Role;
   $rol->name=$request->input("rol_nombre") ;
   $rol->slug=$request->input("rol_slug") ;
   $rol->description=$request->input("rol_descripcion") ;
    if($rol->save())
    {
        Flash::success('Tipo de Usuário criado com sucesso!');
        return redirect(url('/form_novo_rol'));
    }
    else
    {
        Flash::error('Erro ao criar tipo de usuário.');
        return redirect(url('/form_novo_rol'));
    }
}




public function criar_permiso(Request $request){

  
   $permiso=new Permission;
   $permiso->name=$request->input("permiso_nombre") ;
   $permiso->slug=$request->input("permiso_slug") ;
   $permiso->description=$request->input("permiso_descripcion") ;
    if($permiso->save())
    {
        Flash::success('Permissão criada com sucesso!');
        return redirect(url('/form_novo_permiso'));
    }
    else
    {
        Flash::error('Erro ao criar permissão.');
        return redirect(url('/form_novo_permiso'));
    }


}

public function agregar_permiso(Request $request){

     $roleid=$request->input("rol_sel");
     $idper=$request->input("permiso_rol");
     $rol=Role::find($roleid);
     $rol->assignPermission($idper);
    
    if($rol->save())
    {
        Flash::success('Permissão agregada com sucesso!');
        return redirect(url('/form_novo_permiso'));
    }
    else
    {
        Flash::error('Erro ao agregar permissão.');
        return redirect(url('/form_novo_permiso'));
    }



}



public function form_editar_usuario($id){
    $usuario=User::find($id);
    $roles=Role::all();
    return view("formularios.form_editar_usuario")->with("usuario",$usuario)
	                                              ->with("roles",$roles);                                 
}

public function editar_usuario(Request $request){
          
    $idusuario=$request->input("id_usuario");
    $usuario=User::find($idusuario);
    $usuario->name=strtoupper( $request->input("nombres") ) ;
    $usuario->apellidos=strtoupper( $request->input("apellidos") ) ;
    $usuario->telefono=$request->input("telefono");
    
     if($request->has("rol")){
	    $rol=$request->input("rol");
	    $usuario->revokeAllRoles();
	    $usuario->assignRole($rol);
     }
	 
    if( $usuario->save()){
        Flash::success('Usuário atualizado com sucesso!');
        return redirect(url('/listar_usuarios'))
               ->with("idusuario",$idusuario);
    }
    else
    {
        Flash::error('Erro ao atualizar usuário.');
        return redirect(url('/form_editar_usuario'));
    }
}


public function buscar_usuario(Request $request){
	$dato=$request->input("dato_buscado");
	$usuarios=User::where("name","like","%".$dato."%")->orwhere("apellidos","like","%".$dato."%")                                              ->paginate(100);
	return view('listados.listar_usuarios')->with("usuarios",$usuarios);
      }




public function apagar_usuario(Request $request){
        $idusuario=$request->input("id_usuario");
        $usuario=User::find($idusuario);
    
        if($usuario->delete()){
            Flash::success('Usuário deletado com sucesso!');
            return redirect(url('/listar_usuarios'));
        }
        else
        {
            Flash::error('Erro ao deletar usuário.');
            return redirect(url('/listar_usuarios'));
        }
        
     
}

public function editar_acesso(Request $request){
         $idusuario=$request->input("id_usuario");
         $usuario=User::find($idusuario);
         $usuario->email=$request->input("email");
         $usuario->password= bcrypt( $request->input("password") ); 
          if( $usuario->save()){
            Flash::success('Acesso do usuário alterado com sucesso!');
            return redirect(url('/listar_usuarios'))->with("idusuario",$idusuario) ;
          }
          else
          {
            Flash::error('Erro ao alterar acesso do usuário.');
            return redirect(url('/listar_usuarios'));
          }
}



public function agregar_rol($idusu, Request $request){
        $idrol = $request['role'];
        $usuario=User::find($idusu);
        $usuario->assignRole($idrol);
        $usuario=User::find($idusu);
        $rolesasignados=$usuario->getRoles();
        return json_encode ($rolesasignados);


}


public function apagar_rol($idusu, Request $request){
    $idrol = $request['role'];
    $usuario=User::find($idusu);
    $usuario->revokeRole($idrol);
    $rolesasignados=$usuario->getRoles();
    return json_encode ($rolesasignados);


}


public function form_excluir_usuario($id){
  $usuario=User::find($id);
  return view("confirmacoes.form_excluir_usuario")->with("usuario",$usuario);

}


public function apagar_permiso($idrole,$idper){ 
    
    $role = Role::find($idrole);
    $role->revokePermission($idper);
    $role->save();

    Flash::success('Permissão removida com sucesso!');
    return redirect(url('/listar_usuarios'));
}


public function excluir_rol($idrole){

    $role = Role::find($idrole);
    $role->delete();
    
    Flash::success('Tipo de Usuário removido com sucesso!');
    return redirect(url('/listar_usuarios'));
}


}
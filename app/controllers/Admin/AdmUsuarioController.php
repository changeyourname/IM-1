<?php

class AdmUsuarioController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $usuario = AdmUsuario::all();
        return View::make('admin.usuario.index')
            ->with('usuario',$usuario);            
	}
    

    public function Login()
    {
        if(Auth::attempt(array('login'=>$_POST['username'],'password'=>$_POST['password']))){                                
            Session::put("IDUSUARIO",Auth::user()->id_usuario);
            $return_arr["status"]=1;                                                 
        }else{
            $return_arr["status"]=0;
        }
        
        
        return $return_arr;                                                    
    }
    
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('admin.usuario.create');
	}

    
    

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */                                         
	public function store()
	{
		//
        $rules = array
        (
            'nome'      =>'required',
            'email'     =>'required|email|unique:tb_adm_usuario',
            'login'     =>'required|unique:tb_adm_usuario',     
            'password'  =>'required|min:6', 
            'sexo'      =>'required',                                                   
        );
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('usuario/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            
            $permissoes;
            if(isset($_POST['mod'])){
                $permissoes = $_POST['mod'];
                unset($_POST['mod']);
            }
            
            $naoProcessar = array("_token","_method","password");
            $usuario            = new AdmUsuario;
            $usuario->ativo     = Input::get("ativo");
            foreach($_POST as $keys=>$values)
            {
                if(!in_array($keys,$naoProcessar))
                {
                    $usuario->$keys = Input::get($keys);        
                }
            }
            
            if(Input::get('password')!="")
                $usuario->password  = Hash::make(Input::get('password'));
            
            if (Input::hasFile('img'))
            {                       
                $file = Input::file("img");
                $destino  = 'upload/usuarios/';
                
                if (!file_exists($destino)) {
                    mkdir($destino, 0777, true);
                }
                                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension(); 
                $upload_success = Input::file('img')->move($destino,$filename);
                if( $upload_success ) {
                    $usuario->img = $filename;
                }else{
                    
                }
            }
            
            $usuario->save();
            $id = DB::getPdo()->lastInsertId();            
            foreach($permissoes as $permi=>$valor)
            {
                $modulo = $permi;
                 DB::table('tb_adm_permissao')->insert(
                        array('id_adm_usuario'  => $id, 
                              'id_adm_modulo'   => $modulo,
                              'visualizar'      =>((isset($valor['visualizar']))?$valor['visualizar']:0),
                              'inserir'         =>((isset($valor['inserir']))?$valor['inserir']:0),
                              'editar'          =>((isset($valor['editar']))?$valor['editar']:0),
                              'excluir'         =>((isset($valor['excluir']))?$valor['excluir']:0)
                              ));                         
            }               
            
            Session::flash('message','Usu&aacute;rio criado com sucesso,j&aacute; pode acessar o sistema');
            return Redirect::to('usuario');
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        $usuario = AdmUsuario::find($id);
        return View::make('admin.usuario.show')
            ->with('usuario',$usuario);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        $usuario = AdmUsuario::find($id);
        return View::make('admin.usuario.edit')
            ->with('usuario',$usuario);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        
        
        
        $rules = array
        (
            'nome'      =>'required',
            'email'     =>'required',
            'login'     =>'required',     
            'sexo'      =>'required',
        );
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('usuario/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{        
            
            $permissoes = $_POST['mod'];
            unset($_POST['mod']);
                        
            $naoProcessar = array("_token","_method","password");
            $usuario            = AdmUsuario::find($id);
            $usuario->ativo     = Input::get("ativo");
            foreach($_POST as $keys=>$values)
            {
                if(!in_array($keys,$naoProcessar))
                {
                    $usuario->$keys = Input::get($keys);        
                }
            }
            
            if(Input::get('password')!="")
                $usuario->password  = Hash::make(Input::get('password'));
            
            if (Input::hasFile('img'))
            {                     
            
                @unlink("upload/usuarios/".$usuario->img);
                
                $file = Input::file("img");
                $destino  = 'upload/usuarios';
                
                if (!file_exists($destino)) {
                    mkdir($destino, 0777, true);
                }
                                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension(); 
                $upload_success = Input::file('img')->move($destino,$filename);
                
                if( $upload_success ) {
                    $usuario->img = $filename;
                }else{
                    return Redirect::to('usuario/'.$id.'/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
                }
            }
            
            $usuario->save();
            
             
            DB::table("tb_adm_permissao")->where("id_adm_usuario","=",$id)->delete();
            foreach($permissoes as $permi=>$valor)
            {
                $modulo = $permi;
                 DB::table('tb_adm_permissao')->insert(
                        array('id_adm_usuario'  => $id, 
                              'id_adm_modulo'   => $modulo,
                              'visualizar'      =>((isset($valor['visualizar']))?$valor['visualizar']:0),
                              'inserir'         =>((isset($valor['inserir']))?$valor['inserir']:0),
                              'editar'          =>((isset($valor['editar']))?$valor['editar']:0),
                              'excluir'         =>((isset($valor['excluir']))?$valor['excluir']:0)
                              ));                         
            }               
            
            
            Session::flash('message','Usu&aacute;rio Atualizado com Sucesso.');
            return Redirect::to('usuario');
            
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        $usuario = AdmUsuario::find($id);
        $usuario->delete();
        
        Session::flash('message','Usu&aacute;rio excluido com Sucesso.');
        return Redirect::to('usuario');
	}


}

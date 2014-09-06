<?php

class AdmCargoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $secretaria = AdmSecretaria::all();
        return View::make('admin.cargo.index')
            ->with('cargo',$secretaria);            
	}
    
    
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('admin.cargo.create');
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
        );
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('cargo/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            
            $naoProcessar = array("_token","_method");
            $secretaria  = new AdmCargo;
            $secretaria->ativo   = Input::get("ativo");
            foreach($_POST as $keys=>$values)
            {
                if(!in_array($keys,$naoProcessar))
                {
                    $secretaria->$keys = Input::get($keys);        
                }
            }        
            $secretaria->save();
            
            Session::flash('message','Cargo criado com sucesso');
            return Redirect::to('cargo');
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
        $secretaria = AdmCargo::find($id);
        return View::make('admin.cargo.show')
            ->with('cargo',$secretaria);
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
        $secretaria = AdmCargo::find($id);
        return View::make('admin.cargo.edit')
            ->with('cargo',$secretaria);
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
        );
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('usuarios/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            
            $naoProcessar = array("_token","_method");
            
            $secretaria                  =  AdmCargo::find($id);
            $secretaria->ativo           = Input::get("ativo");
            foreach($_POST as $keys=>$values)
            {
                if(!in_array($keys,$naoProcessar))
                {
                    $secretaria->$keys = Input::get($keys);        
                }
            }
            $secretaria->save();
            
            Session::flash('message','Cargo Atualizado com Sucesso.');
            return Redirect::to('cargo');
            
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
        $usuario = Usuarios::find($id);
        $usuario->delete();
        
        Session::flash('message','Cargo excluido com Sucesso.');
        return Redirect::to('cargo');
	}


}

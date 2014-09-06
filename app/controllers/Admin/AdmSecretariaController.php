<?php

class AdmSecretariaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $secretaria = AdmSecretaria::all();
        return View::make('admin.secretaria.index')
            ->with('secretaria',$secretaria);            
	}
    
    
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('admin.secretaria.create');
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
            return Redirect::to('secretaria/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            
            $naoProcessar = array("_token","_method");
            $secretaria  = new AdmSecretaria;
            $secretaria->ativo   = Input::get("ativo");
            foreach($_POST as $keys=>$values)
            {
                if(!in_array($keys,$naoProcessar))
                {
                    $secretaria->$keys = Input::get($keys);        
                }
            }        
            $secretaria->save();
            
            Session::flash('message','Secretaria criado com sucesso');
            return Redirect::to('secretaria');
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
        $secretaria =    AdmSecretaria::find($id);
        return View::make('admin.secretaria.show')
            ->with('secretaria',$secretaria);
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
        $secretaria = AdmSecretaria::find($id);
        return View::make('admin.secretaria.edit')
            ->with('secretaria',$secretaria);
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
            return Redirect::to('secretaria/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            
            $naoProcessar = array("_token","_method");
            
            $secretaria                  =  AdmSecretaria::find($id);
            $secretaria->ativo           = Input::get("ativo");
            foreach($_POST as $keys=>$values)
            {
                if(!in_array($keys,$naoProcessar))
                {
                    $secretaria->$keys = Input::get($keys);        
                }
            }
            $secretaria->save();
            
            Session::flash('message','Secretaria Atualizado com Sucesso.');
            return Redirect::to('secretaria');
            
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
        $secretaria =   AdmSecretaria::find($id);
        $secretaria->delete();
        
        Session::flash('message','Secretaria excluida com Sucesso.');
        return Redirect::to('secretaria');
	}


}

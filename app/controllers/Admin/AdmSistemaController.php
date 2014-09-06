<?php

class AdmSistemaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $sistema = AdmSistema::all();
        return View::make('admin.sistema.index')
            ->with('sistema',$sistema); 
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('admin.sistema.create');
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
            'icone'     =>'required',            
        );
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('sistema/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            
            $naoProcessar = array("_token","_method");
            
            $sistema            = new AdmSistema();
            $sistema->ativo     = Input::get("ativo");
            foreach($_POST as $keys=>$values)
            {
                if(!in_array($keys,$naoProcessar))
                {
                    $sistema->$keys = Input::get($keys);        
                }
            }            
            $sistema->save();            
            
            Session::flash('message','Sistema criado com sucesso');
            return Redirect::to('sistema');
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
        $sistema = AdmSistema::find($id);
        return View::make('admin.sistema.show')
            ->with('sistema',$sistema);
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
        $sistema = AdmSistema::find($id);
        return View::make('admin.sistema.edit')
            ->with('sistema',$sistema);
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
            'icone'     =>'required',            
        );
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('sistema/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            
            $naoProcessar = array("_token","_method");
            $sistema     = AdmSistema::find($id);            
            $sistema->ativo     = Input::get("ativo");
            foreach($_POST as $keys=>$values)
            {
                if(!in_array($keys,$naoProcessar))
                {
                    $sistema->$keys = Input::get($keys);        
                }
            }
            $sistema->save();            
            
            Session::flash('message','Sistema Atualizado com sucesso');
            return Redirect::to('sistema');
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
	}


}

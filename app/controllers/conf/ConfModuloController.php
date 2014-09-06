<?php

class ConfModuloController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $modulo = ConfModulo::all();
        return View::make("conf.modulo.index")
                ->with("modulo",$modulo);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make("conf.modulo.create");
          
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $rules  = array
        (
        'nome'          =>'required',
        'id_sistema'    =>'required',
        'icone'         =>'required',
        );
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('modulo/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            
           $naoProcessar = array("_token","_method");
            
           $modulo              = new ConfModulo;
           $modulo->ativo       = Input::get("ativo");
           foreach($_POST as $keys=>$values)
            {
                if(!in_array($keys,$naoProcessar))
                {
                    $modulo->$keys = Input::get($keys);        
                }
            }                       
           $modulo->save();
            
            Session::flash('message','Modulo criado com sucesso.');
            return Redirect::to('modulo');
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
        $modulo = ConfModulo::find($id);
        return View::make("conf.modulo.show")
                ->with("modulo",$modulo);
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
        $modulo = ConfModulo::find($id);
        return View::make("conf.modulo.edit")
                ->with("modulo",$modulo);
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
        $rules  = array
        (
        'nome'          =>'required',
        'id_sistema'    =>'required',
        'icone'         =>'required',
        );
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('modulo/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }else{
            
           $naoProcessar = array("_token","_method");
            
           $modulo              = ConfModulo::find($id);
           $modulo->ativo       = Input::get("ativo");
           foreach($_POST as $keys=>$values)
            {
                if(!in_array($keys,$naoProcessar))
                {
                    $modulo->$keys = Input::get($keys);        
                }
            }                                  
           $modulo->save();
            
           Session::flash('message','Modulo Altualizado com sucesso.');
           return Redirect::to('modulo');
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

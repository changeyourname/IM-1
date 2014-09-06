<?php

class AdmUnidadeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $unidadeAdm = AdmUnidade::all();
        return View::make("adm.unidade.index")
                ->with("unidadeAdm",$unidadeAdm);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
       return View::make("adm.unidade.create");
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
            'nome'                  =>'required',
            'id_tipo_unidade'       =>'required',
        );
        
        $validator = Validator::make(Input::all(),$rules);   
        
        if($validator->fails())
        {
                return Redirect::to("adm.unidade.create")
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));     
        }else{
            
            $naoProcessar = array("_token");
            
            $unidade            = new AdmUnidade;
            $unidade->ativo     =  Input::get("ativo");
            foreach($_POST as $keys=>$values)
            {
                if(!in_array($keys,$naoProcessar))
                {
                    $unidade->$keys      = Input::get($keys);        
                }
            }
            $unidade->save();
            
            Session::flash('message','Unidade criada com sucesso');
            return Redirect::to('usuarios');
                        
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
        $unidade = AdmUnidade::find($id);
        return View::make("adm.unidade.show")
                    ->with("unidade",$unidade);
            
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
        $unidade = AdmUnidade::find($id);
        return View::make("adm.unidade.edit")
            ->with("unidadeAdm",$unidade);
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
            'nome'                  =>'required',
            'id_tipo_unidade'       =>'required',
        );
        
        $validator = Validator::make(Input::all(),$rules);   
        
        if($validator->fails())
        {
                return Redirect::to("adm.unidade.create")
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));     
        }else{
            
            $naoProcessar = array("_token","_method");
            $unidade            =  AdmUnidade::find($id);
            $unidade->ativo     =  Input::get("ativo");
            foreach($_POST as $keys=>$values)
            {
                if(!in_array($keys,$naoProcessar))
                {
                    $unidade->$keys = Input::get($keys);        
                }
            }
            $unidade->save();
            
            Session::flash('message','Unidade Atualizada com sucesso');
            return Redirect::to('unidadeAdm');
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

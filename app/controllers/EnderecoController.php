<?php

class EnderecoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
    
    public function GeoLocalizacao()
    {
        // Inicia o cURL acessando uma URL
        $cURL = curl_init('http://maps.googleapis.com/maps/api/geocode/json?address='.$_POST['numero'].'+'.str_replace(" ","+",$_POST['logradouro']).',+'.str_replace(" ","+",$_POST['bairro']).',+'.str_replace(" ","+",$_POST['cidade']).'&sensor=true_or_false');
        // Define a opчуo que diz que vocъ quer receber o resultado encontrado
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        // Executa a consulta, conectando-se ao site e salvando o resultado na variсvel $resultado
        $resultado = curl_exec($cURL);
        // Encerra a conexуo com o site
        curl_close($cURL);
        return $resultado;        

    }

    public function BuscaCep()
    {
        $cURL = curl_init('http://cep.correiocontrol.com.br/'.$_POST['cep'].'.json');
        // Define a opчуo que diz que vocъ quer receber o resultado encontrado
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        // Executa a consulta, conectando-se ao site e salvando o resultado na variсvel $resultado
        $resultado = curl_exec($cURL);
        // Encerra a conexуo com o site
        curl_close($cURL);
        return $resultado;
    }
    

}

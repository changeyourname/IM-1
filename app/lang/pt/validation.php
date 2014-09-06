<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "O :attribute deve ser aceito.",
	"active_url"           => "O :attribute n&atilde;0 &eaculte uma URL valida.",
	"after"                => "O :attribute deve ser uma data maior que :date.",
	"alpha"                => "O :attribute só pode conter letras.",
	"alpha_dash"           => "O :attribute só pode conter letras, números e traços.",
	"alpha_num"            => "O :attribute may only contain letters and numbers.",
	"array"                => "O :attribute só pode conter letras e números.",
	"before"               => "O :attribute deve ser uma data antes :date.",
	"between"              => array(
		"numeric" => "O :attribute deve ser entre :min and :max.",
		"file"    => "O :attribute deve ser entre :min and :max kilobytes.",
		"string"  => "O :attribute deve ser entre :min and :max characters.",
		"array"   => "O :attribute deve ser entre :min and :max items.",
	),
	"confirmed"            => "O :attribute confirmação não corresponde.",
	"date"                 => "O :attribute n&atilde; &eacute; uma data valida.",
	"date_format"          => "O :attribute n&atilde; corresponde ao formado :format.",
	"different"            => "O :attribute e :other s&atilde;o diferentes.",
	"digits"               => "O :attribute deve ser :digits digitos.",
	"digits_between"       => "O :attribute deve ser entre :min e :max digitos.",
	"email"                => "O :attribute deve ser um e-mail valido.",
	"exists"               => "O :attribute selecionado &eacute invalido.",
	"image"                => "O :attribute deve ser imagem.",
	"in"                   => "O :attribute selecionado &eacute invalido.",
	"integer"              => "O :attribute deve ser inteiro.",
	"ip"                   => "O :attribute deve ser um endere&ccedil;o de IP.",
	"max"                  => array(
		"numeric" => "O :attribute não pode ser maior do que :max.",
		"file"    => "O :attribute não pode ser maior do que :max kilobytes.",
		"string"  => "O :attribute não pode ser maior do que :max characters.",
		"array"   => "O :attribute não podem ter mais do que :max items.",
	),
	"mimes"                => "O :attribute deve ser um arquivo do tipo: :values.",
	"min"                  => array(
		"numeric" => "O :attribute deve ser de pelo menos :min.",
		"file"    => "O :attribute deve ser de pelo menos :min kilobytes.",
		"string"  => "O :attribute deve ser de pelo menos :min characters.",
		"array"   => "O :attribute deve ter pelo menos :min items.",
	),
	"not_in"               => "O :attribute selecionado &eacute; invalido.",
	"numeric"              => "O :attribute deve ser um numero.",
	"regex"                => "O :attribute formato é inválido.",
	"required"             => "O :attribute &eacute; obrigatorio.",
	"required_if"          => "O :attribute campo é obrigatório quando :other &eacute; :value.",
	"required_with"        => "O :attribute campo é obrigatório quando :values &eacute; present.",
	"required_with_all"    => "O :attribute campo é obrigatório quando :values &eacute; present.",
	"required_without"     => "O:attribute campo é obrigatório quando :values &eacute; not present.",
	"required_without_all" => "O :attribute campo é obrigatório quando nenhum dos :values estão presentes.",
	"same"                 => "O :attribute e :other deve corresponder.",
	"size"                 => array(
		"numeric" => "O :attribute deve ser :size.",
		"file"    => "O :attribute deve ser :size kilobytes.",
		"string"  => "O :attribute deve ser :size characters.",
		"array"   => "O :attribute deve conter :size itens.",
	),
	"unique"               => "Este :attribute ja esta sendo utilizado.",
	"url"                  => "O :attribute formato é inválido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);

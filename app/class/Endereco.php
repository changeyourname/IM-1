<?php
use Illuminate\Support\Facades\Form as Form;
use Illuminate\Support\Facades\HTML as HTML;
use Illuminate\Support\Facades\Input as Input;

class Endereco
{      
    function CriarEndereco(){
        
    ?>
    <div class="form-group">
        <?php echo Form::label('cep', 'CEP') ?>
        <?php echo Form::text('cep', Input::old('cep'), array('class' => 'form-control cep')) ?>
    </div>        
    
    <div class="form-group">
        <?php echo Form::label('uf', 'UF') ?>
        <?php echo Form::text('uf', Input::old('cidade'), array('class' => 'form-control')) ?>
    </div>        
    
    <div class="form-group">
        <?php echo Form::label('cidade', 'Cidade') ?>
        <?php echo Form::text('cidade', Input::old('cidade'), array('class' => 'form-control')) ?>
    </div>        
    
    <div class="form-group">
        <?php echo Form::label('bairro', 'Bairro') ?>
        <?php echo Form::text('bairro', Input::old('bairro'), array('class' => 'form-control')) ?>
    </div>        
    
    <div class="form-group">
        <?php echo Form::label('logradouro', 'Logradouro') ?>
        <?php echo Form::text('logradouro', Input::old('logradouro'), array('class' => 'form-control')) ?>
    </div>        
    
    <div class="form-group">
        <?php echo Form::label('numero', 'Numero') ?>
        <?php echo Form::text('numero', Input::old('numero'), array('class' => 'form-control')) ?>
    </div>        
    
    <div class="form-group">
        <?php echo Form::label('complemento', 'Complemento') ?>
        <?php echo Form::text('complemento', Input::old('complemento'), array('class' => 'form-control')) ?>
    </div>        
    
    <div class="form-group">
        <?php echo Form::label('lat', 'Latitude') ?>
        <?php echo Form::text('lat', Input::old('lat'), array('class' => 'form-control')) ?>
    </div>        
    
    <div class="form-group">
        <?php echo Form::label('lng', 'Longitude') ?>
        <?php echo Form::text('lng', Input::old('lng'), array('class' => 'form-control')) ?>
    </div>        
    <script type="text/javascript">
$(function(){
    $("#cep").blur(function(){
        
        $("#uf").addClass("spinner");
        $("#bairro").addClass("spinner");
        $("#cidade").addClass("spinner");
        $("#logradouro").addClass("spinner");
        
        $.ajax({
          type: "POST",
          url: "<?php echo URL::to("/"); ?>/cep",
          data: { cep: $("#cep").val().replace("-","")},
          dataType: 'json'
        })
        .done(function(e)
        {
            
            $("#uf").removeClass("spinner");
            $("#bairro").removeClass("spinner");
            $("#cidade").removeClass("spinner");
            $("#logradouro").removeClass("spinner");
            
            $("#uf").val(e.uf);
            $("#bairro").val(e.bairro);
            $("#logradouro").val(e.logradouro);
            $("#cidade").val(e.localidade);
            Geo();
        });
    });
    
    
    
    
    
    $("#numero").blur(function(){
        Geo();
    });
    
});

function Geo()
{
    $.ajax({
          type: "POST",
          url: "<?php echo URL::to("/"); ?>/geo",
          data: { numero: $("#numero").val(), logradouro: $("#logradouro").val(), bairro: $("#bairro").val(), cidade: $("#cidade").val() },
          dataType: 'json'
        })
        .done(function(e)
        {   
            $("#lat").val("");
            $("#lng").val("");
            var adres =  e.results[0].address_components;
            var adres_form =  e.results[0].formatted_address;
            var geo = e.results[0].geometry;            
            
            var latitude = geo.location.lat;
            var longitude = geo.location.lng;
            
            if(latitude != -23.5015299 && longitude != -47.45256029999999){
                $("#lat").val(latitude);
                $("#lng").val(longitude);
            }else{
                alert('Não foi possivel capiturar a geolocalizacao deste endereço');
            }
        });
}

</script>
    
        <?php        
        
    }   
}
?>

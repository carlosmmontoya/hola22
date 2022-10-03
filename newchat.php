<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
require "escritor.php";
$leer=new contraseña;

$usuario=$_GET["usuario"];
$locuUsuario=$_GET["lcuente"];
$contactos=$_GET["contactos"];
$contraseña=$_GET["contrasena"];
$ide=$_GET["ide"];
$lugar=$_GET["lugar"];
$AnchoP=$_GET["Ancho"];
$AltoP=$_GET["Alto"];
$ubicacion=$_POST["ubicacion"];
$ubicacion2=$_POST["ubicacion2"];
///echo $ubicacion."  y".$ubicacion2;

////////////////////////////////////////////////-------------------funcion que convierte las coordenadas decimales en coordenadas grados minutos segundos
function convertidoraMSG($valor,$orientacion){
$cifra1=substr($valor,0,2);

$punto=substr($valor,1,1);

$conver=substr($valor,2)*60;

if($punto=="."){
$cifra1=substr($valor,0,1);

$conver=substr($valor,1)*60;

}

///arreglada hasta una cifra decimal y un punto con respecto a cifra 2 y hay coordenadas con dos cifras y un punto 


$cifra2=substr($conver,0,2);


$punto=substr($conver,1,1);

$conver2=substr($conver,2)*60;

if($punto=="."){
$cifra2=substr($conver,0,1);


$conver2=substr($conver,1)*60;


}


$cifra3=substr($conver2,0,4);
return  $cifra1.utf8_encode('°').$cifra2."'".$cifra3.''.$orientacion;
}
$coordenadass1= convertidoraMSG($ubicacion,"N");
$coordenadass2=convertidoraMSG($ubicacion2,"E");
///////////////////////////////////////////////////-------------------------fin function que tiene que ver 

function tamañosparamesamovil($AnchoP,$AltoP){
$resta=$AltoP-($AltoP/2);
$resta2=$resta-($resta/2);
if($AnchoP>$AltoP){
$AltoP=300;

}

if($AnchoP<$AltoP){
$AltoP=$AltoP+$resta;

}

return $AltoP;

}
$AltoP=tamañosparamesamovil($AnchoP,$AltoP);
//$texto=$_GET["texto"];
//$tocobotonenviar=$_GET["tocoboton"];

//$usuario=$_POST["usuario"];
//$locuUsuario=$_POST["lcuente"];
$texto=$_POST["texto"];
$textosss='

<div class="usuariosenconeccion">

'.$texto1sss.'
</div>


<div class="usuariosenconeccion">

'.$locuUsuario.'
</div>
<div class="usuariosenconeccion">

'.$locuUsuario.'
</div>
<div class="usuariosenconeccion">

'.$locuUsuario.'
</div>
<div class="usuariosenconeccion">

'.$locuUsuario.'
</div>
<div class="usuariosenconeccion">

'.$locuUsuario.'
</div>

';




///////////----------------------function escritura---------------------------
function escritura($usuario,$locuUsuario,$texto,$coordenadass1,$coordenadass2){
$leer=new contraseña;
$tiempoS=time();
$cadenacoordenadaas=$coordenadass1.$coordenadass2;

$path = "public/newchat_actualizado";
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
$path = "public/newchat_actualizado/".$usuario;
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}

$path = "public/newchat_actualizado/".$usuario."/".$locuUsuario;
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
$path = "public/newchat_actualizado/".$usuario."/".$locuUsuario."/".$tiempoS;
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}


$path = "public/newchat_actualizado/".$locuUsuario;
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
$path = "public/newchat_actualizado/".$locuUsuario."/".$usuario;
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}

$path = "public/newchat_actualizado/".$locuUsuario."/".$usuario."/".$tiempoS;
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}

$leer->escribir_A($texto,"public/newchat_actualizado/".$usuario."/".$locuUsuario."/".$tiempoS."/texto.txt");
$leer->escribir($texto,"public/newchat_actualizado/".$usuario."/".$locuUsuario."/".$tiempoS."/texto.txt");

$leer->escribir_A($usuario,"public/newchat_actualizado/".$usuario."/".$locuUsuario."/".$tiempoS."/locutor.txt");
$leer->escribir($usuario,"public/newchat_actualizado/".$usuario."/".$locuUsuario."/".$tiempoS."/locutor.txt");

$leer->escribir_A($tiempoS,"public/newchat_actualizado/".$usuario."/".$locuUsuario."/".$tiempoS."/unix.txt");
$leer->escribir($tiempoS,"public/newchat_actualizado/".$usuario."/".$locuUsuario."/".$tiempoS."/unix.txt");



////////////-------------copia 
$leer->escribir_A($texto,"public/newchat_actualizado/".$locuUsuario."/".$usuario."/".$tiempoS."/texto.txt");
$leer->escribir($texto,"public/newchat_actualizado/".$locuUsuario."/".$usuario."/".$tiempoS."/texto.txt");

$leer->escribir_A($usuario,"public/newchat_actualizado/".$locuUsuario."/".$usuario."/".$tiempoS."/locutor.txt");
$leer->escribir($usuario,"public/newchat_actualizado/".$locuUsuario."/".$usuario."/".$tiempoS."/locutor.txt");

$leer->escribir_A($tiempoS,"public/newchat_actualizado/".$locuUsuario."/".$usuario."/".$tiempoS."/unix.txt");
$leer->escribir($tiempoS,"public/newchat_actualizado/".$locuUsuario."/".$usuario."/".$tiempoS."/unix.txt");

$leer->escribir_A("","public/newchat_actualizado/".$locuUsuario."/".$usuario."/aviso.txt");
$leer->escribir(avisoMensajesinleer(),"public/newchat_actualizado/".$locuUsuario."/".$usuario."/aviso.txt");

$leer->escribir_A("","public/newchat_actualizado/".$locuUsuario."/".$usuario."/localizacion.txt");
$leer->escribir($cadenacoordenadaas,"public/newchat_actualizado/".$locuUsuario."/".$usuario."/localizacion.txt");


}
if($texto and $usuario and $locuUsuario and $contraseña){
escritura($usuario,$locuUsuario,$texto,$coordenadass1,$coordenadass2);
}

function avisoMensajesinleer(){
$texto='
<div class="avisomensajesinleer">
Leeme
<img src="img/sms.png" width="50" height="50">


</div>

';

return $texto;
}


////function lecturamensajes($usuario){
function lecturamensajes($usuario,$locuUsuario){
$texto="";
$leer=new contraseña;


$path = "public/newchat_actualizado/".$usuario."/".$locuUsuario;
if (file_exists($path)) {
   $contenidoUsuario=$leer->leerdir("public/newchat_actualizado/".$usuario."/".$locuUsuario);
}




if ($contenidoUsuario  and $usuario and $locuUsuario ) {
    


$path = "public/newchat_actualizado/".$usuario."/".$locuUsuario;
if (file_exists($path)) {
   $contenidoUsuario=$leer->leerdir("public/newchat_actualizado/".$usuario."/".$locuUsuario);
}
for($j=3;$j<sizeOf($contenidoUsuario)+1;$j++){

$texto1=$leer->leer("public/newchat_actualizado/".$usuario."/".$locuUsuario."/".$contenidoUsuario{$j}."/texto.txt");
$locutor=$leer->leer("public/newchat_actualizado/".$usuario."/".$locuUsuario."/".$contenidoUsuario{$j}."/locutor.txt");
$unix=$leer->leer("public/newchat_actualizado/".$usuario."/".$locuUsuario."/".$contenidoUsuario{$j}."/unix.txt");

if($locutor == $usuario){
$clase="claselocuente";
$usparlante=$usuario;
}else{
$clase="claseelocuente";
$usparlante=$locutor;
}
$divtexto ='

<div class="'.$clase.'">
<div style="color: blue; width:30%; height:30%;font-size: 18px; ">
'.date("d/m/Y/H:i:s",$unix).'
</div>
<div style="color: White; width:100%; height:70%;text-align:left; ">
'.$usparlante.' dice: '.$texto1.'
</div>

</div>';

$texto=$texto.$divtexto;



}



///}


return $texto;
}else{
$clase="claseelocuente";
if($usuario){
if($locuUsuario){
$divtexto2 ='

<div class="'.$clase.'">

'.$usuario.' un momento porfabor  '.escritura($locuUsuario,$usuario,"hola",$coordenadass1,$coordenadass2).'

</div>';
}else{
$divtexto2 ='

<div class="'.$clase.'">

'.$usuario.' selecciona con quien quieres comunicarte

</div>';

}
}else{

$divtexto2 ='

<div class="'.$clase.'">

Para enviar mensaje introduce cualquier nombre como usuario 

</div>';

}
$texto=$divtexto2;
return $texto;
}


}

function contactos($usuario,$locuUsuario,$contactos,$contraseña){
$leer=new contraseña;
$path = "public/newchat_actualizado/".$usuario;
if ($usuario) {
$path = "public/newchat_actualizado/".$usuario;
if (file_exists($path)) {
if($contactos){
$usuarioscarpetas=$leer->leerdir("public/newchat_actualizado/");
$numerodecarpetasusuarios=sizeOf($usuarioscarpetas);
}else{
$usuarioscarpetas=$leer->leerdir("public/newchat_actualizado/".$usuario);
$numerodecarpetasusuarios=sizeOf($usuarioscarpetas);
$leer->escribir("","public/newchat_actualizado/".$usuario."/".$locuUsuario."/aviso.txt");

}
}else{

$usuarioscarpetas=$leer->leerdir("public/newchat_actualizado/");
$numerodecarpetasusuarios=sizeOf($usuarioscarpetas);

}
for($i=4;$i<$numerodecarpetasusuarios+1;$i++){

$mensajesinleer[$i]=$leer->leer("public/newchat_actualizado/".$usuario."/".$usuarioscarpetas[$i]."/aviso.txt");

$localizadores[$i]=$leer->leer("public/newchat_actualizado/".$usuario."/".$usuarioscarpetas[$i]."/localizacion.txt");
$texto=$texto.'

<div class="usuariosenconeccion">
'.$mensajesinleer[$i].' <a href="https://www.google.es/maps/place/'.$localizadores[$i].'">'.$localizadores[$i].'</a>
<div class="vistanombre">
<a href="newchat.php?usuario='.$usuario.'&lcuente='.$usuarioscarpetas[$i].'&contrasena='.$contraseña.'"> '.$usuarioscarpetas[$i].'</a>
</div>

</div>';

}
return $texto;

}else{

$clase="usuariosenconeccion";
$divtexto2 ='

<div class="'.$clase.'">


<form action="newchat.php" method="get" enctype="multipart/form-data" name="f">
<font color="#037CA9" size="5">
Si no te has daddo de alta escribe un alias y una password . 
</font><br>
<font color="#037CA9" size="5">
1.Nombre de Usuario ( o alias )<br>


<input type="text" maxlength="20" name="usuario" class="cajadetexto"><br>
2.password<br>
<input type="password" maxlength="20" name="contrasena" class="cajadetexto"><br>
<input type="hidden" name="lcuente" value="'.$locuUsuario.'" ><br>

<input type="submit" value="aceptar" class="botonenviar" >

</form >

</div>';
$texto=$divtexto2;
return $texto;

}

}

function comprovacionlocousuario($locuUsuario,$ide,$lugar){
///echo "public/registroUsuarios/chicas/".$lugar."/".$ide."/textos/newcarg.dat";
$leer=new contraseña;
$pat="public/newchat_actualizado/".$locuUsuario;
$pat2="public/newchat_actualizado/".$locuUsuario."/contraseña.dat";
if (!file_exists($pat )and $locuUsuario) {
    mkdir($pat, 0777, true);
	$Dcontraseñaamorfreir=$leer->leer("public/registroUsuarios/chicas/us".$lugar."/".$ide."/textos/newcarg.dat");
	
	$contraseñaamorfreir=explode(chr(32),$Dcontraseñaamorfreir);
	echo $contraseñaamorfreir[0];
	if($contraseñaamorfreir[0]){
	$contraseña=$contraseñaamorfreir[0];
	
	}else{
	$contraseña="admin";
	
	}
	
	$leer->escribir_A("",$pat2);
  $leer->escribir($contraseña,$pat2);
 
  
	
	
}



}

function seguridad($usuario,$contraseña){
$leer=new contraseña;
$pat="public/newchat_actualizado/".$usuario."/contraseña.dat";
$pat2="public/newchat_actualizado/".$usuario;
$clase="usuariosenconeccion";
$divtexto2 ='

<div class="'.$clase.'">


<form action="newchat.php" method="get" enctype="multipart/form-data" name="f">

<font color="#037CA9" size="5">
<p>El usuario o alias ya existe . Use otro Nombre o alias </p>
1.Nombre de Usuario ( o) alias <br>


<input type="text" maxlength="20" name="usuario" class="cajadetexto"><br>
2.pasword :<br>
<input type="text" maxlength="20" name="contrasena" class="cajadetexto"><br>
<input type="hidden" name="lcuente" value="'.$locuUsuario.'" ><br>
<input type="submit" value="aceptar" class="botonenviar" >

</form >

</div>';

if (file_exists($pat)) {
   $contraseñaguardada=$leer->leer($pat);
   if($contraseñaguardada ==$contraseña){
      $retorno="aceptar";
   }else{

   $retorno=$divtexto2;
   }
   
   
}else{

  if (file_exists($pat2)) {
       $retorno=$divtexto2;
  }else{
  
if (!file_exists($pat2)) {
    mkdir($pat2, 0777, true);
}
  $leer->escribir_A("",$pat);
  $leer->escribir($contraseña,$pat);
  $retorno="aceptar";
  }

}

return $retorno;


}

comprovacionlocousuario($locuUsuario,$ide,$lugar);
?>


<html>
<head>
<title>Chat</title>
<meta http-equiv="refresh" content="30" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
html{

font-family: "Lucida Sans", sans-serif;


}
 #hoja{

 

 width:100%;
 height:100%;
 

 
  


 }
 
 #cabecera{

 width:100%;
 height:125px;
  border-left-color:#FF0000;
 font-family: sans-serif;
font-size: 50px;
font-weight: 400;
color: #ffffff;
background: #889ccf;
text-align:center;

overflow: hidden;
border-radius: 35px 35px 0px 0px;
-moz-border-radius: 35px 35px 0px 0px;
-webkit-border-radius: 35px 35px 0px 0px;
border: 2px solid #5878ca;
 }
 
 #fondochat{

 width:100%;
 height: <?php echo $AltoP; ?>px;

  text-align:center;

 
 }
 #usuarios{

 width:30%;
 height:100%;

  
   float:left; 
   overflow:scroll;
   
 }
 
 #chat{

 width:70%;
 height:100%;

   
  float: left;
  overflow:scroll;
  
 
 }
 #margenpiechat{
 width:100%;
 height: 10px;
 float: left;
 }
 #piechat {

 width:100%;
 height: 60px;




  
  
}
#fondocajadetexto{
 float: left;
 width:80%;
  height: 100%;
     border-radius: 30px;
   border: 1px solid #39c;
   background-color: #def;
   margin-left:7px;
}
#fondobotonenter{

border-bottom-style:solid;

border-color:#0099FF;
 float: left;
  width:15%;
  height: 40px;
  margin-left:20px;
  border-radius: 30px;
  background-color:#0066FF;
  box-shadow: 7px 7px 7px -7px #276873;
  

 
}
#fondobotonenter:hover{
border-bottom-style:none;


border-color:#0000CC;
 float: left;
  width:15%;
  height: 40px;
  margin-left:20px;

  background-color:#0066FF;
  box-shadow: 0px 0px 7px +7px #ffffff;
 
}
#imagenboton{


    width:200px;
  height: 100%;
}
.cajadetexto{
 border-radius: 30px;
 border-style:none;
   width:99%;
   height:40px;
   font-size:45px;
}
.botonenviar{
  
   border-radius: 30px;

   width:100%;
      height:45px;
   font-size:30px;
   
}


#footer {

 width:100%;
 height:50px;

   font-family: sans-serif;
font-size: 18px;
font-weight: 400;
color: #ffffff;
background: #889ccf;

overflow: hidden;
border-radius: 0px 0px 35px 35px;
-moz-border-radius: 0px 0px 35px 35px;
-webkit-border-radius: 0px 0px 35px 35px;


}
#fondofondochat {
border-style:solid;
 width:100%;
 height:100%;


}


.usuariosenconeccion{
font-family: sans-serif;
font-size: 18px;
font-weight: 400;
color: #ffffff;
background: #889ccf;
margin: 0 0 2px;
overflow: hidden;
padding: 20px;

}

.claselocuente{
font-family: sans-serif;
font-size: 40px;
font-weight: 400;
color: #ffffff;
background-color:#6699CC;
margin: 0 0 2px;
overflow: hidden;
padding:20px;
border-radius: 35px 0px 0px 35px;
-moz-border-radius: 35px 0px 0px 35px;
-webkit-border-radius: 35px 0px 0px 35px;
border: 2px solid #5878ca;

}
.claseelocuente{

font-family: sans-serif;
font-size: 40px;
font-weight: 400;
color: #ffffff;
background: #889ccf;
margin: 0 0 2px;
overflow: hidden;
padding:20px;
border-radius: 0px 35px 35px 0px;
-moz-border-radius: 0px 35px 35px 0px;
-webkit-border-radius: 0px 35px 35px 0px;
border: 2px solid #5878ca;

}
#fondopieusaychat{
border-style:solid;
width:90%;

}


/* For mobile phones: */
[class*="col-"] {
  width: 100%;
}

@media only screen and (min-width: 600px) {
  /* For tablets: */
  .col-s-1 {width: 8.33%;}
  .col-s-2 {width: 16.66%;}
  .col-s-3 {width: 25%;}
  .col-s-4 {width: 33.33%;}
  .col-s-5 {width: 41.66%;}
  .col-s-6 {width: 50%;}
  .col-s-7 {width: 58.33%;}
  .col-s-8 {width: 66.66%;}
  .col-s-9 {width: 75%;}
  .col-s-10 {width: 83.33%;}
  .col-s-11 {width: 91.66%;}
  .col-s-12 {width: 100%;}
}
@media only screen and (min-width: 768px) {
  /* For desktop: */
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
}
.contactos{



 border-style:solid;

   width:20%;
      
   font-size:20px;
   color:#FFFFFF;
-moz-box-shadow: 30px 30px 30px -7px #276873;
	
         -webkit-box-shadow: 30px 30px 30px -7px #276873;

	  box-shadow: 30px 30px 30px -7px #276873;
	  margin-left:3px;
float:left;
      
}
a:link, a:visited, a:active {
    text-decoration:none;
}

.vistanombre{
float:left;
font-size:40px;
color:#FFFFFF;
}
.avisomensajesinleer{

float:left;
}

</style>
<script language="javascript">
function bajarscrollbar(){
chatBox = document.querySelector(' #fondochat >  #chat ');

// cuando exista un nuevo mensaje
chatBox.scrollTop = chatBox.scrollHeight;
window.scroll({
  top: 1000,
  left: 100,
  behavior: 'smooth'
});

}

function tocoelboton(){

var hedden=document.getElementById("tocoboton");
hedden.value="toco"

}
function enviarformulario(){

var f=document.getElementById("for");
f.submit();

}
</script>
<script language="javascript">
////////////////////////////////////////------------functiones de localizacion javascript entregara 2 hidden con las coordenadas decimales
window.onload = miUbicacion;
var global1=0;
function miUbicacion(){
	// Si los servicios de geolocalización están disponibles
	if(navigator.geolocation){
	// Para obtener la ubicación actual llama getCurrentPosition.
		navigator.geolocation.getCurrentPosition( 
		siHayExito,
		siHayError,
		{enableHightAccuracy: false, timeout:Infinity, maximage:0} );
	}else{ 
  alert("Los servicios de geolocalizaci\363n  no est\341n disponibles");
	}
}
function siHayExito(posicion){
	var latitud = posicion.coords.latitude
	var longitud = posicion.coords.longitude
	var output = document.getElementById("ubicacion");
	var output2 = document.getElementById("ubicacion2");
	///output.innerHTML = "Latitud: "+latitud+"  Longitud: "+longitud;
	output.value=latitud;
	output2.value=longitud;
	global1=latitud;
	
}

function siHayError(error){//errorHandler
// el objeto posiblesErrores traduce al castellano los posibles errores
		var posiblesErrores = {
			0:"Error desconocido",
			1:"Permiso denegado por el usuario.",
			2:"Posici\363n no disponible",
			3:"Desconexi\363n por tiempo"
		}
		var mensajeError = posiblesErrores[error.code];
		// error.message : información adicional
		if(error.code == 0 || error.code == 2){
			mensajeError = mensajeError +" "+error.message;
		}
		var div = document.getElementById("ubicacion");
		div.innerHTML = mensajeError;
}

function conversoraminutossegundos_grados(){
var texto = document.getElementById("ubicacion");

alert(texto.value);

}

////////////////////////////////////////////////////////-------------------------------fin funciones de localizacion
</script>
<?php
if(!isset($_GET['r'])){
echo '

<script language="javascript">


document.location="'.$PHP_SELF.'?r=1&Ancho="+screen.width+"&Alto="+screen.height+"&usuario='.$usuario.'&lcuente='.$locuUsuario.'&contactos='.$contactos.'&contrasena='.$contraseña.'&ide='.$ide.'&lugar='.$lugar.'&latitud="+global1;


</script>
';

}


?>
</head>

<body onLoad="bajarscrollbar(),miUbicacion()">

<div class="col-12 col-s-12">
<div id="hoja">
  <div id="cabecera">
  <?php
  if($locuUsuario){
  $coquienhablas=" En linea : ".$locuUsuario;
  }else{
  $coquienhablas="";
  }
  $cadenacoordenadaas=$coordenadass1.$coordenadass2;
  

  ?>
  <?php echo '<div>'. $usuario.$coquienhablas.'</div>';?>
  <?php echo'<div class="contactos"><a href="newchat.php?usuario='.$usuario.'&contactos=contactos&contrasena='.$contraseña.'">Contactos</a></div>';?>
 <?php echo'<div class="contactos"><a href="newchat.php">Salir</a></div>';?>
	<div class="contactos">
	<?php
	echo '
  
  <a href="https://www.google.es/maps/place/'.$cadenacoordenadaas.'">'.$cadenacoordenadaas.'</a>
  ';
  ?>
	</div>
  </div>
 
    <div id="fondochat">
	
	<div id="usuarios">
	<?php  $ss=seguridad($usuario,$contraseña); if($ss=="aceptar"){ echo contactos($usuario,$locuUsuario,$contactos,$contraseña);}else{ echo $ss;} ?>
	</div>
	<div id="chat">
	<?php echo lecturamensajes($usuario,$locuUsuario) ;?>
	
	</div>
  
  </div>
  
  <div id="margenpiechat"></div>
	<div id="piechat">
	<form action="" method="post" enctype="multipart/form-data" id="for" name="for">
	
	
	<input type="hidden" name="usuario"  value="<?php echo $usuario; ?>" >
	<input type="hidden" name="lcuente"  value="<?php echo $locuUsuario ?>" >
	
		<input type="hidden"  id="ubicacion" value="" name="ubicacion"  ><input type="hidden"  id="ubicacion2" value="" name="ubicacion2">
	
	
	<div id="fondocajadetexto">
	<input type="textarea" id="text" class="cajadetexto"  placeholder="Escriba aqui" name="texto" row="3" ></textarea>
	</div>
	<div id="fondobotonenter"  onClick="enviarformulario()">
	
	
	<!---<input type="submit" value="Enter"  class="botonenviar"  onclick="tocoelboton()"  >--->
	</div>
	</form>

	
	
	
    </div>
   
 

 <div id="footer"></div>
 </div>
 </div>
</body>
</html>

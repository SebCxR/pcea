<?php $innerOnly = array_key_exists("innerOnly", $_GET);
if(!$innerOnly){
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" SYSTEM "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>	
<meta name="generator" content="Dev-PHP 2.6.0"/>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<meta name="edvRoot" content="."/>

<link rel="stylesheet" type="text/css" href="../css/edvHtml.css"/>
<link type="text/css" href="../css/ui-lightness/jquery-ui-1.8.21.custom.min.css" rel="stylesheet"/>

<script src="../js/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script>
<script src="../js/edvHtml.min.js" type="text/javascript"></script>

<link href="../jquery/treeTable/css/jquery.treetable.css" rel="stylesheet" type="text/css" />
<script src="../jquery/treeTable/jquery.treetable.js"></script>

<link rel="stylesheet" type="text/css" href="PCEA.css"/>
<script src="comptes.js" type="text/javascript"></script>

<?php }?>
<?php if(!$innerOnly) {
?></head>
<body class="edv">
<?php }?>
<div class="DataTable async dossiers pcea">
	<table class="pceaTable treeTable" cellspacing="0" cellpadding="0">	
	</table>
</div>				

<?php if(!$innerOnly) {
?>
</body>
<?php }?>
<?php 
// Identifiant de l'utilisateur :
session_start();
$_SESSION["loggeduser"] = array();
$_SESSION["loggeduser"]["iduser"]= $_GET["iduser"];
if (isset($_GET["nameuser"])) { $_SESSION["loggeduser"]["nameuser"] = $_GET["nameuser"]; }
else { $_SESSION["loggeduser"]["nameuser"] = "CoopEShop - PCEA"; }

$idLoggedUser =  $_SESSION["loggeduser"]["iduser"];

include_once("config.php");
$user = new User();

?>
<script>
$(document.body).ready(function(){
			
	$.ajax({url : "<?php echo path_to_php?>builder_comptes.php", 
		data : {'lgduser' : <?php echo $idLoggedUser ?>}
		,cache : false
		,success : function(msg){
		//	showComptes(msg);
		$(".DataTable.async table").comptes("showComptes",msg);
					
					}
		,async : true 
		,type : "GET" 
	});
});
</script>
<?php if(!$innerOnly) {
?></html><?php
}?>

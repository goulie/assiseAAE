

/*****function to hide and show****/
function hide1 (){
	if (document.getElementById('oui_m').checked){
		document.getElementById('type_m').style.display='block';		
	}
	else
	{
		document.getElementById('type_m').style.display='none';
	}
}
/******************/
function hide (){
	if (document.getElementById('non_p').checked){
		document.getElementById('raison_p').style.display='block';		
	}
	else
	{
		document.getElementById('raison_p').style.display='none';
	}
}
/*************/
function hide3 (){
	if (document.getElementById('autre').selected){
		document.getElementById('type_org').style.display='block';		
	}
	else
	{
		document.getElementById('type_org').style.display='none';
	}
}

/*******************/
function hide4 (){
	if (document.getElementById('autre').selected){
		document.getElementById('type_org').style.display='block';		
	}
	else
	{
		document.getElementById('type_org').style.display='none';
	}
}

/************************************************/
function hide5(){
	if (document.getElementById('autre_raison').checked){
		document.getElementById('raison').style.display='block';
	}
	else
	{
		document.getElementById('raison').style.display='none';

	}
}
 if (true) {}

/***************************************************************************************************************************
					Validation
 ***************************************************************************************************************************/
if (document.getElementById('input_nom').value == ""){
		document.getElementById('nom').style.display='block';
	}
	else
	{
		document.getElementById('nom').style.display='none';

	}
/**************************************************************************************************
					
**************************************************************************************************/

<!doctype html>
<?php
 static $user_key="0020fa17b49c0cbaadcf189caa219897";
 static $gw_host="healthcareapi.ocp3demo.com";
?>
<html lang="us">
<head>
	<meta charset="utf-8">
	<title>My Healthcare Demo</title>
	<link href="jquery-ui.css" rel="stylesheet">
	<style>
	body{
		font: 90% "Trebuchet MS", sans-serif;
		margin: 50px;
	}
	.demoHeaders {
		margin-top: 2em;
	}
	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
	}
	select {
		width: 200px;
	}
	
	table, th, td {
	    border: 0px;
	    border-collapse: collapse;
	}
	th, td {
	    padding: 5px;
	    text-align: left;    
	}
	
	.zui-table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
	}
	.zui-table thead th {
	    background-color: #DDEFEF;
	    border: solid 1px #DDEEEE;
	    color: #336B6B;
	    padding: 10px;
	    text-align: left;
	    text-shadow: 1px 1px 1px #fff;
	}
	.zui-table tbody td {
	    border: solid 1px #DDEEEE;
	    color: #333;
	    padding: 10px;
	    text-shadow: 1px 1px 1px #fff;
	}
	</style>
</head>
<body>
<h1> <img src="healthimage/icon-health.png" alt="Health Icon" height="42" width="42"/> Welcome to JBoss Fuse Heathcare DEMO:</h1>

<div class="ui-widget">
	<p>This demo is to demonstrate how JBoss Fuse can advance your healthcare system simplfy development with microservices architecture</p>
	<p></p>
</div>

<!-- Highlight / Error -->
<h2 class="demoHeaders">Messages :</h2>
<div class="ui-widget" id="esbMsgDiv">
</div>

<BR/>
<center><img src="dots-line.png" ></center>
<BR/>

<table style="width:100%">
  <tr>
    <td>
    	<div class="rcorners">
    		<h2 class="demoHeaders"><img src="register.png" height="30" width="30">    Registration</h2>
				<p>
				<form>
					<table>
						<tr>
							<th>First name:</th>
							<td><input type="text" name="firstname"></td>
						</tr>
						<tr>
							<th>Last name:</th>
							<td><input type="text" name="familyname"></td>
						</tr>
						<tr>
							<th>HIS number:</th>
							<td><input type="text" name="hisId"></td>
						</tr>
						<tr>
							<th rowspan="2"><button id="button" type="button">Register</button></th>
						</tr>												
					</table>
				</form>	
				</p>
			</div>
		</td>
    <td> 	
    	<div class="rcorners">
    		<h2 class="demoHeaders"><img src="clinic.png" height="30" width="30">   Clinic</h2>
				<div id="clinicDiv"/>
			</div>
			<BR/>
			<BR/>
			<table>
				<tr>
				<th>HIS number:</th>
				<td><input type="text" name="clinichisId"></td>
				</tr>
			</table>
			<div id="clinicone" style="display:none">
				<table>
							<tr>
								<th>Observation</th>
								<td><input type="text" name="observation"></td>
							</tr>
							<tr>
								<th>Schedule Test:<BR/><BR/>
									Test detail:</th>
								<td>
										<select id="dept">
									    <option value="laboratory">Laboratory</option>
									    <option value="radiology">Radiology</option>
										</select>
										<BR/>
										<input type="text" name="testdetail">
								</td>
							</tr>
							<tr>
								<th rowspan="2"><button id="dotest" type="button">Go Test!</button></th>
							</tr>												
					</table>
			</div>
			<div id="clinictwo" style="display:none">
				<table >	
					<tr>
						<th>Prescription:</th>
						<td>		
										<select id="interval">
									    <option value="QD">Dialy</option>
									    <option value="QH">Hourly</option>
									    <option value="BID">Twice Dialy</option>
									    <option value="HS">At Bedtime</option>
										</select>
										<BR/>
										<select id="drugs">
									    <option value="LISINOPRIL">LISINOPRIL</option>
									    <option value="ISOTRETINOIN">ISOTRETINOIN</option>
									    <option value="METFORMIN">METFORMIN</option>
									    <option value="PREDNISONE">PREDNISONE</option>
										</select>
						</td>
				  </tr>
				  <tr>
						<th rowspan="2"><button id="prescribe" type="button">Prescribe</button></th>
					</tr>
				</table>
			</div>
    </td>
  </tr>
  <tr>
  	<td rowspan="2">
  		<div class="rcorners">
  		<h2 class="demoHeaders"><img src="database.png" height="30" width="30">   HIS Database</h2>
  		<table class="zui-table" >
			  <thead>
			  <tr>
			    <th>Family Name</th>
			    <th>First Name</th>
			    <th>HIS ID</th>
			    <th>Gender</th>
			  </tr>
			<thead>
			<tbody id="tablediv">
			</tbody>
			</table>
  		</div>
  	</td>
    <td>
	    <div class="rcorners">
	    	<h2 class="demoHeaders"><img src="lab.png" height="30" width="30">   Laboratory</h2>
				<div id="labDiv"/>
			</div>
		</td>
  </tr>
  <tr>
    <td>
    <div class="rcorners">
    	<h2 class="demoHeaders"><img src="radiology.png" height="30" width="30">   Radiology</h2>
			<div id="radiologyDiv"/>
		</div>
    </td>
  </tr>
</table>

<BR/>
<center><img src="dots-line.png" ></center>
<BR/>
<table style="width:100%">
  <tr>
  	<td>
  		<div class="rcorners-purple">
				<h2 class="demoHeaders"><img src="CS-Logo-PNG.png" height="30" width="30">   Pharmacy</h2>
				HIS ID: <input type="text" name="pharmacyhisId"> 
				<button id="pharmacybutton" type="button">Get Prescription!</button>
				<BR/>
				<BR/>
				<table class="zui-table" >
				  <thead>
				   <tr>
				    <th>HIS ID</th>
				    <th>Prescription</th>
				    <th>Interval</th>
				   </tr>
				  <thead>
				  <tbody id="pharmacytablediv">
			    </tbody>
				</table>
				
  			
  			
  	
			</div>
  	</td>
  	
  </tr>
</table>

	
<script src="external/jquery/jquery.js"></script>
<script src="jquery-ui.js"></script>
<script>
var user_key = "<?php echo $user_key; ?>";
var gw_host = "<?php echo $gw_host; ?>";
var MAX_ESB_MSG_DISPLAY=2;
var MAX_CONSOLE_LINE_DISPLAY=6;

var clinicConsoleArray = [];
var labConsoleArray = [];
var radiologyConsoleArray = [];

var esbMsgArray = [];

$( "#accordion" ).accordion();

$( "#button" ).button();
$( "#dotest" ).button();
$( "#prescribe" ).button();
$( "#pharmacybutton" ).button();






// Link to open the dialog
$( "#dialog-link" ).click(function( event ) {
	$( "#dialog" ).dialog( "open" );
	event.preventDefault();
});


// Hover states on the static widgets
$( "#dialog-link, #icons li" ).hover(
	function() {
		$( this ).addClass( "ui-state-hover" );
	},
	function() {
		$( this ).removeClass( "ui-state-hover" );
	}
);

	$("#button").click(function(){
		
		$.ajax({ 
		   type: "GET",
		   dataType: "jsonp",
		   url: "http://healthwebconsole-healthcare-demo.apps.aws.ocp3demo.com/his/registry/"+$('input[name=firstname]').val()+"/"+$('input[name=familyname]').val()+"/"+$('input[name=hisId]').val(),
		   success: function(data){        
		     alert(data);
		   }
		   
		});
		$('input[name=clinichisId]').val($('input[name=hisId]').val());
		
		setTimeout( populateTable(), 5000);
		$("#clinicone").show();
		$("#clinictwo").show();
	});
	
	$("#dotest").click(function(){
		if($('input[name=hisId]').val() == null || $('input[name=hisId]').val() == ""){
			alert('Must specify His ID');
    	return;
    }
    
    if($('input[name=testdetail]').val() == null || $('input[name=testdetail]').val() == ""){
    	alert('Specify Test details please!');
    	return;
    }
    
    if($('input[name=observation]').val() == null || $('input[name=observation]').val() == ""){
    	alert('Must enter observation detail before sending patient for more test!');
    	return;
    }
        		
        		
		
		$.ajax({ 
		   type: "GET",
		   dataType: "jsonp",
		   url: "http://"+gw_host+"/his/dotest/"+$('input[name=hisId]').val()+"/"+$( "#dept option:selected" ).val()+"/"+$('input[name=testdetail]').val()+"/"+$('input[name=observation]').val()+"?user_key="+user_key,
		   success: function(data){        
		     alert(data);
		   }
		   
		});
	});

	$("#prescribe").click(function(){
		
		$.ajax({ 
		   type: "GET",
		   dataType: "jsonp",
		   url: "http://healthwebconsole-healthcare-demo.apps.aws.ocp3demo.com/his/prescribe/"+$('input[name=hisId]').val()+"/"+$('#interval option:selected').val()+"/"+$('#drugs option:selected').val(),
		   success: function(data){        
		     alert(data);
		   }
		   
		});
	});

	$("#pharmacybutton").click(function(){
		
		populatePharmacyTable($('input[name=pharmacyhisId]').val());
	});
	
		
$(document).ready(function() {
	
	if(!("WebSocket" in window)){
		$('#chatLog, input, button, #examples').fadeOut("fast");
		$('<p>Oh no, you need a browser that supports WebSockets. How about <a href="http://www.google.com/chrome">Google Chrome</a>?</p>').appendTo('#container');
	}else{

  connect();

	function connect(){
    try{

			//##Displaying messaging in Clinic Console
			var clinicsocket = new WebSocket("ws://clinicservice-healthcare-demo.apps.aws.ocp3demo.com/demo");
			clinicsocket.onopen = function(){ clinicMessage('Starting Clinic System Simulator v 1.0.0 ......');}
			clinicsocket.onmessage = function(msg){clinicMessage('Patient===> '+msg.data+' admitted!');}
			clinicsocket.onclose = function(){clinicMessage('Clinic System shutdown...');}
    	function clinicMessage(msg){$('#clinicDiv').html(message(clinicConsoleArray,msg));}

			//##Displaying messaging in Laboratory Console
			var labsocket = new WebSocket("ws://laboratoryservice-healthcare-demo.apps.aws.ocp3demo.com/demo");
			labsocket.onopen = function(){ labMessage('Starting Laboratory System Simulator v 1.4.0 ......');}
			labsocket.onmessage = function(msg){labMessage(msg.data);}
			labsocket.onclose = function(){labMessage('Laboratory System shutdown...');}
    	function labMessage(msg){$('#labDiv').html(message(labConsoleArray,msg));}
    	
			//##Displaying messaging in Radiology Console
			var radiologysocket = new WebSocket("ws://radiologyservice-healthcare-demo.apps.aws.ocp3demo.com/demo");
			radiologysocket.onopen = function(){ radiologyMessage('Starting Radiology System Simulator v 2.0.5 ......');}
			radiologysocket.onmessage = function(msg){radiologyMessage('Patient '+msg.data);}
			radiologysocket.onclose = function(){radiologyMessage('Radiology System shutdown...');}
    	function radiologyMessage(msg){$('#radiologyDiv').html(message(radiologyConsoleArray,msg));}
    	
    	//##Connect to ESB Message 
    	var esbmsgsocket = new WebSocket("ws://hisesb-healthcare-demo.apps.aws.ocp3demo.com/demo");
			esbmsgsocket.onopen = function(){console.log('Starting getting ESB messages ......');}
			
			esbmsgsocket.onmessage = function(msg){
				esbMsgArray.push(createESBMsg(msg.data));
				if(esbMsgArray.length > MAX_ESB_MSG_DISPLAY){
					esbMsgArray.shift();
				}
				
				var msgContent="";
				for (i = 0; i < esbMsgArray.length; i++) { 
					msgContent += esbMsgArray[i]+"<br/> ";
				}
				
				$('#esbMsgDiv').html(msgContent);
			}
			
			esbmsgsocket.onclose = function(){console.log('Stop getting ESB messages');}
    	
    	
		} catch(exception){clinicMessage('Error:'+exception);}
			
					
			function message(consoleArray, msg){
				consoleArray.push(msg);		
				
				if(consoleArray.length > MAX_CONSOLE_LINE_DISPLAY){
					consoleArray.shift();
				}
				
				var msgContent="";
				for (i = 0; i < consoleArray.length; i++) { 
					
					msgContent += consoleArray[i]+"<br/> ";
					
				}
				
				return msgContent;
			}
			
			function createESBMsg(msg){
				var msgcontent='<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"><p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><strong>Message transmitted : </strong>"';
				msgcontent += msg;
				msgcontent += '</p></div>';
				 
				return msgcontent;
			}
		}
	
	}
	
	
});

function populateTable() {

    var user_key = "<?php echo $user_key; ?>";
    var gw_host = "<?php echo $gw_host; ?>";
    var tableContent = '';


    $.get( 'http://'+gw_host+'/his/allpatients?user_key='+user_key, function( data ) {
				var lineByline = data.split('\n');
        $.each(lineByline , function(index,value){
        	
        		if(value == null || value == ""){
        			return;
        		}
            tableContent += '<tr>';
						
						var tabBytab = value.split('\t');
						$.each(tabBytab , function(indext,valuet){
							if(valuet != null || valuet != "")
							 tableContent += '<td>' + valuet + '</td>';
						});
						
           
            tableContent += '</tr>';
        });


        $('#tablediv').html(tableContent);
    });
};

function populatePharmacyTable(pharmacyhisid) {
    var user_key = "<?php echo $user_key; ?>";
    var gw_host = "<?php echo $gw_host; ?>";
    var tableContent = '';
	  var pharmacyUrl = 'http://'+gw_host+'/his/pharmacy/'+pharmacyhisid+'/?user_key='+user_key;
		
		if("" == pharmacyhisid){
			alert('Please enter HIS ID in the Pharmacy section!');	
			return;
		}else{
		
	    $.get(pharmacyUrl, function( data ) {
	    	 
					if(""== data){
						alert('No Prescription Found for HIS ID:'+pharmacyhisid);
					}else{
		      	var lineByline = data.split('\n');
		        $.each(lineByline , function(index,value){
		        	
		            tableContent += '<tr>';
								
								var tabBytab = value.split('\t');
								$.each(tabBytab , function(indext,valuet){
									 tableContent += '<td>' + valuet + '</td>';
								});
								
		           
		            tableContent += '</tr>';
		        });
	        }
	
	
	        $('#pharmacytablediv').html(tableContent);
	    });
	  }
};

</script>
</body>
</html>

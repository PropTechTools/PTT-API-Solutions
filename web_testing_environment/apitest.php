<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PropTechApi Test</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function macrolage_search() {
	//Credentials
	var key = "SeNiWHq0YHiLwvNp4pOi9tuil8Vs9c7xMj3MlCyr"
	var usr = "malte.hupe@proptechtools.de"
	
	//Required datainput
	var gemeindeschluessel = $('#gemeindeschluessel').val()
	var address = encodeURIComponent($('#address').val())
	var koord = $('#koord').val()


	var textlength = $('#textlength').val()
	var fazit = $('#fazit').val();
	
	//Requestername - For billing purposes; 
	var requester = "Deutsche_Kreditbank_AG"
	
	if(koord != ""){
		URL = "https://www.proptechapi.de/macrolage/json?apiKey="+key+"&name="+usr+"&latlng="+koord+"&requester="+requester+"&textlength="+textlength+"&fazit="+fazit
	}
	if(address != ""){
		URL = "https://www.proptechapi.de/macrolage/json?apiKey="+key+"&name="+usr+"&address="+address+"&requester="+requester+"&textlength="+textlength+"&fazit="+fazit
	}
	if(gemeindeschluessel != ""){
		URL = "https://www.proptechapi.de/macrolage/json?apiKey="+key+"&name="+usr+"&communityKey="+gemeindeschluessel+"&requester="+requester+"&textlength="+textlength+"&fazit="+fazit
	}


	$('#link').html("<a href="+URL+" target='_blank'>"+URL+"</a>");
	
	
	$.getJSON(URL, function(data) {
		console.log(data.message)
		if (data.success == true){
			$('#text').html(data.data.html_text);
			console.log(data.data.html_text);
			//return;
		} else {
			$('#text').html(data.message);
			console.log(data)
			//return;
		}
	})

			//$('#text').html("REST call failed: "+ URL);

}
</script>
</head>

<body>
<h2>PropTechApi - Testing Environment</h2>
<h4>Gemeindeschlüssel/Adresse/Koordinaten</h4>
<input type="text" id="gemeindeschluessel" value="" placeholder="Gemeindeschlüssel">
<input type="text" id="address" value="" placeholder="Adresse">
<input type="text" id="koord" value="" placeholder="Koordinaten">
<br />

<h4>Textlänge</h4>
<select id="textlength">
  <option value="long">long</option>
  <option value="short">short</option>
</select> 
<br />

<h4>Fazit</h4>
<select id="fazit">
  <option value="sehr_gut">Sehr gut</option>
  <option value="gut">Gut</option>
  <option value="durchschnittlich">Durchschnittlich</option>
  <option value="maessig">Mäßig</option>
  <option value="schlecht">Schlecht</option>
</select> 
<br />
<br />
<button onclick="macrolage_search()">Makrolage abrufen</button>
<br />
<br />
<br />
<br />
<h4>Textausgabe:</h4>
<div id="text" style="width:800px; height:400px; border-color:#000; border-style:solid; border-width:1px"></div>

<h4>Api-Link:</h4>
<div id="link"></div>

</body>
</html>
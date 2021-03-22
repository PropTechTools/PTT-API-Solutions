<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PropTechApi Test</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
header("Access-Control-Allow-Origin: *");
?>

</head>

<body style="width:100%">
<a href="https://www.proptechtools.de/loesungen#section-Api"><img src="/PropTechTools_500px.png" style ="height:60px; margin-right:20px; float:right"></a>
<div style="height:20px"></div>

<a href="makro-api.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px">Makrolage-API</a>
<a href="mikro-api-easy.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px; margin-left:20px">Mikrolage-API[Easy]</a>
<!--<a href="mikro-api.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px; margin-left:20px">Mikrolage-API[Advanced]</a>-->
<a href="kartenset-api.php" style="color:#ff9800; cursor: pointer;display: inline; text-decoration:none; font-size:26px; margin-left:20px">Kartenset-API</a>
<hr style="margin-top: 10px;">

<h2>PropTechApi - Developing and Testing Environment (DTE)</h2>

<h3 style="text-decoration: underline;">Anmeldedaten:</h3> 
Test-Apiname: <input readonly="readonly" type="text" id="user" value="" disabled placeholder="sYp4kEAtyUnH67K1">
Test-Apikey: <input readonly="readonly" type="text" id="key" value="gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU" disabled placeholder="">
Test-Requester: <input readonly="readonly" type="text" id="requester" value="test@proptechtools.de" disabled placeholder="">
<br>
<a style="font-style:italic">Bei Verwendung der eigenen Anmeldedaten muss "dte" in der URL entfernt werden: www.proptechapi.de/dte/macrolage/json... => www.proptechapi.de/macrolage/json...</a>
<br>
<h3 style="text-decoration: underline;">Api-Inputparameter:</h3> 
<h4>abfragbare Testdatensätze:</h4> 
<table> 
	<tr> 
		<th>ID</th> 
		<th>Gemeindeschlüssel</th> 
		<th>Ort-Art</th> 
		<th>Ort-Name</th> 
		<th>Bundesland</th> 
		<th>Beispiel Koordinate</th>
	</tr>

	<tr> 
		<td>1</td>
		<td>072355007001</td> 
		<td>Gemeinde</td> 
		<td>Aach</td> 
		<td>Rheinland-Pfalz</td>
		<td>49.789503, 6.590633</td>
	</tr>  

	<tr> 
		<td>2</td>
		<td>083355001001</td> 
		<td>Stadt</td> 
		<td>Aach</td> 
		<td>Baden-Württemberg</td> 
		<td>47.840882, 8.859067</td> 
	</tr> 

	<tr> 
		<td>3</td>
		<td>053340002002</td> 
		<td>Stadt</td> 
		<td>Aachen</td> 
		<td>Nordrhein-Westfalen</td> 
		<td>50.777180, 6.093335</td> 
	</tr>  

	<tr>
		<td>4</td> 
		<td>081365001088</td> 
		<td>Stadt</td> 
		<td>Aalen</td> 
		<td>Baden-Württemberg</td> 
		<td>48.837336, 10.094682</td> 
	</tr> 

	<tr> 
		<td>5</td>
		<td>064390001001</td> 
		<td>Gemeinde</td> 
		<td>Aarbergen</td> 
		<td>Hessen</td> 
		<td>50.245978, 8.078530</td> 
	</tr> 
</table>
<br>
<hr>

</body>
</html>





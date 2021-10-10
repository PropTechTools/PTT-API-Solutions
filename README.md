# PTT API-Solutions
This is the End user manual for using the PTT API-Solutions.

### 1) `D`eveloping and `T`esting `E`nvironment (DTE-System)

**Attention:** The user and api-key shown below belong to a test account whose request range is limited to five communities only. 
<br/>
<br/>
**Test-User:** sYp4kEAtyUnH67K1
<br/>
**Test-ApiKey:** gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU
<br/>
**Test-Requester:** test@proptechtools.de
<br/>
<br/>
The following five communities are available in the DTE-system:

| community key   | city type | city name |   state    |   latlng    |
| -------------   |:-------------:|:-------------:|:-------------:|:-------------:|
| 072355007001     | community | Aach | Rheinland-Pfalz | 49.789503,6.590633 |
| 083355001001     | city | Aach | Baden-Württemberg | 47.840882,8.859067 |
| 053340002002     | city | Aachen | Nordrhein-Westfalen | 50.777180,6.093335 |
| 081365001088     | city | Aalen | Baden-Württemberg | 48.837336,10.094682 |
| 064390001001     | community | Aarbergen | Hessen | 50.245978,8.078530 |

### 2) Live-System
When using your own Account-Credentials (also when using your own testaccount) you have to switch to the Live-System.<br> 
Changing from DTE-System to Live-System (with access to the complete database) is easy:

* Delete the `dte` in URL: www.proptechapi.de/dte/macrolage/json... => www.proptechapi.de/macrolage/json...
* Update to your personal PTT-credentials (all credentials can be found in your webplattformaccount (accountmanagment):
    * apiKey
    * name
    * requester

<br/>

### Obligatory parameters for the GET-Request for accessing every PTT API:
There are five different obligatory parameters which have to be included in every api-request. While `apiKey`,`name` and `requester` are for authentication purposes, `latlng` is used to autoanalyse the full address. In combination with `objectkategorie` the address values make up a unique order that connects all api-requests of different api-module and is displayed in the PTT-Webplattform module <b>Auftragsmanagement</b>. To remove uncertainty in the autoanalysis of the address, the addressparameters can be optionally overwritten by seperatlly requesting them.

| Property 	| Explanation 	| Mandatory? 	| Default 	| 
|:---	|:---	|:---	|:---	|
| apiKey 	| Authentication purpose. `apikey` is unique per company 	| <b>obligatory</b> 	| -	| 	|
| name 	| Authentication purpose. `name` is unique per company | <b>obligatory</b> 	|  -	| 
| requester 	| Authentication purpose. `requester` is unique per account 	| <b>obligatory</b> 	| -	| 	|
| latlng 	| Ordergeneration: Submit coordinates to generate unique order and connect api-requests of different modules with via addressparameters to it | <b>obligatory</b> 	| Format: `XX.XXXXXX,XX.XXXXXX` 	|
| objektkategorie 	| Ordergeneration: Submit coordinates to generate unique order and connect api-requests of different modules with via addressparameters to it	| <b>obligatory</b> 	| [List of parameters](https://github.com/PropTechTools/PTT-API-Solutions/blob/master/ptt-mikro-api.md#overview)	|
| adresszusatz 	| Option to overwrite address autoanalysed by `latlng`  | optional 	| autoanalysed if empty	|
| strassenname 	| Option to overwrite address autoanalysed by `latlng`  | optional 	| autoanalysed if empty	|
| hausnummer 	| Option to overwrite address autoanalysed by `latlng`  | optional 	| autoanalysed if empty	|
| stadt 	| Option to overwrite address autoanalysed by `latlng`  | optional 	| autoanalysed if empty	|
| plz 	| Option to overwrite address autoanalysed by `latlng` 	| optional 	| autoanalysed if empty	|
| bundesland 	| Option to overwrite address autoanalysed by `latlng`  | optional 	| autoanalysed if empty	|
| land 	| Option to overwrite address autoanalysed by `latlng` 	| optional 	| autoanalysed if empty	|

### [I) PTT-Makro-API](ptt-makro-api.md)
### [II) PTT-Mikro-API](ptt-mikro-api.md)
### [III) PTT-Kartenset-API](ptt-kartenset-api.md)

### Useful Documents:
* [api_dropdownvalues.xlsx](doc/api_parameter.xlsx)<br>
=> Overview of all requestable dropdown-api-parameters and their necessary values.

### Testing-environment 
All PTT-APIs can be tested on [https://api.proptechtools.de](https://api.proptechtools.de) or [Postman](https://documenter.getpostman.com/view/6392593/S1ETRGTx#149be5c6-8885-4ea1-be10-b2650dafe35e).

### Changelog
[Changelog](ptt-changelog.md) of API-Updates

[<- back to overview](README.md)
***

## II) PTT-Mikro-API

### General Information:

* The file `display_input.js` is included to manage the display of userinputfields.
<br>=> The user will only be able to input the minimum amout of necessary data.
* There are two ways to integrate the Mikro-API, [a) Easy Integration](#easy) and [b) Advanced Integration](#adv).

### <a name="easy"></a>a) Easy Integration:

* Requesttime around **6 sec**
* User enters all userdata, all userdata is collected and sent in **one request at the end** of the process.


### <a name="adv"></a>b) Advanced Integration:

* Requesttime is reduced to **1,2 sec**
<br>=> Increases usabilty and leads to a more responsive userinterface.


* Time saving is accomplished by splitting **one request at the end** into **two requests**:
  - request at the beginning:
    * specified by the parameter `auto_analysis = true` 
    * reduced to parameter `objektkategorie` and koordinats/mapbased parameters `bewertungsobjekt`, `stadtzentrum`, `aerztliche_primaerversorgung_ort_koordinate` and `aperiodischer_bedarf_ort_koordinate`.
    * still takes 6 sec to load but is loaded in the background while user is inputting additional userdata
  - request at the end:
    * including all userdata in the query
    * takes 1,2 sec to load and only processeses userdata

* The results of both requests are merged and form a hybridtext. 
* Updating the userdata and requesting an updated form of the text triggers only the seccond request (request at the end [1,2 sec]).

### Optional api settings parameters:
* auto_analysis
  * see [b) Advanced Integration](#adv) for more information
  * possible values: `< "true" | "false" | "">`

* data
  * returns row data to visualise points of interests on which the text is based on
  * possible values: `< "true" | "false" | "">`

### Useful Documents:

* [micro_api_parameter.xlsx](doc/micro_api_parameter.xlsx)
<br>=> Overview of all requestable micro-api-parameters and their necessary values.

* [object_categories.xlsx](doc/object_categories.xlsx)
<br>=> Overview of all textvariants returned depending on the chosen objectcategeory and the needed userdata.


### Examples

* [GET-Request: Easy Integration (1 Request)](examples/mikro-api-001-easy-1request.md)
* [GET-Request: Advanced Integration (2 Requests)](examples/mikro-api-002-advanced-2requests.md)

### Web-testing-environment 
The PTT-Mikro-API can also be tested here: [https://api.proptechtools.de/mikro-api-easy.php](https://api.proptechtools.de/mikro-api-easy.php).

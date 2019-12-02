[<- back to overview](README.md)
***

## II) PTT-Mikro-API

### General Information:

* The file `display_input.js` is included to manage the display of userinputfields.
<br>=> The user will only be able to input the minimum amout of necessary data.


### Easy Integration:

* Requesttime around **10 sec**
* User enters all userdata, all userdata is collected and sent in **one request at the end** of the process.


### Advanced Integration:

* Requesttime is reduced to **2 sec**
<br>=> Increases usabilty and leads to a more responsive userinterface.


* Time saving is accomplished by splitting **one request at the end** into **two requests**:
  - request at the beginning:
    * specified by the parameter `auto_analysis = true` 
    * reduced to 3 obligatory parameters `bewertungsobjekt`, `stadtzentrum` and `objektkategorie`
    * will still take 10 sec to load, but is loaded in the background while the user is inputing additional userdata
  - request at the end:
    * specified by the parameter `auto_analysis = false` 
    * including all user input data in the query
    * will take 2 sec to load, and only process userinput

* The results of both requests are merged and form a hybridtext. 
* Updating the userinput and requesting an updated form of the text triggers only request at the end (loadtime 2 sec).

### Useful Documents:

* [micro_api_parameter.xlsx](doc/micro_api_parameter.xlsx)
<br>=> Overview of all requestable micro-api-parameters and their necessary values.

* [object_categories.xlsx](doc/object_categories.xlsx)
<br>=> Overview of all textvariants returned depending on the chosen objectcategeorie and the needed userinput.


### Examples

* [GET-Request: Easy Integration (1 Request)](examples/mikro-api-001-easy-1request.md)
* [GET-Request: Advanced Integration (2 Requests)](examples/mikro-api-002-advanced-2requests.md)

### Web-testing-environment 
The PTT-Makro-API can also be tested here: [https://api.proptechtools.de/mikro-api-easy.php](https://api.proptechtools.de/mikro-api-easy.php).
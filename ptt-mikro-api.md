## II) PTT-Mikro-API

### General integration:
<br/>
* The file `< file display_input.js >` is included to manage the display of userinputfields.
=> The user will only be able to input the minimum amout of necessary data.
<br/>
<br/>
### Easy integration:
<br/>
* Requestertime around **10 sec**.
* User enters all userdata, all userdata is collected and requested in **one request** when pressing the button `< Mikrolage abrufen >`
<br/>
<br/>
### Advanced integration:
<br/>
* Requestertime is reduced to **2 sec**. 
=> Increases usabilty and leads to a more responsive userinterface.
<br/>
<br/>
* Decrease is accomplished by splitting one request at the end (including all user input) into **two requests**:
- request at the beginning:
    * specified by the parameter "auto_analysis" `< true >` 
    * reduced to 3 obligatory parameters `< bewertungsobjekt >`, `< stadtzentrum >` and `< objektkategorie >`
    * will still take 10 sec to load, but is loaded in the background while the user is inputing additional userdata
- request at the end:
    * specified by the parameter "auto_analysis" `< false >` 
    * including all user input data in the query
    * will take 2 sec to load, and only process userinput
<br/>
* The results of both requests will be merged and form a hybridtext. 
* Updating the userinput and requesting an adjusted text will only trigger the request at the end and therefore only take another 2 sec to update the text

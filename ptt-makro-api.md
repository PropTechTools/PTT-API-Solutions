[<- back to overview](README.md)
***

## I) PTT-Makro-API

### Obligatory parameters:
* One of the following parameters must be passed:
  * address <br>(success probability less than 100% -> depending on address analysis)
  * latlng <br>(success probability 100%)
  * communityKey <br>(success probability 100%)
* textlength
  * possible values: `< short | long >`

### Optional parameters:
* fazit
  * possible values: `< sehr_gut | gut | mittel | maessig | schlecht >`

Wirtschaftsstruktur is automatically analysed in communitys with a population larger then 15.000, but can be overwritten by requesting the following parameters: 
* wirtschaftsstruktur1/wirtschaftsstruktur2/wirtschaftsstruktur3
  * possible values: [wirtschaftsstruktur_parameters.xlsx](doc/wirtschaftsstruktur_parameter.xlsx).

### Postman Examples

The PTT-Makro-API examples can also be found on [postman](https://documenter.getpostman.com/view/6392593/S1ETRGTx#149be5c6-8885-4ea1-be10-b2650dafe35e).

### Examples

* [GET-Request: Short Textlength by coordinates](examples/makro-api-001-short_textlength_coordinations.md)
* [GET-Request: Long Textlength by address](examples/makro-api-002-long_textlength_address.md)
* [GET-Request: Long Textlength by community key](examples/makro-api-003-long_textlength_communitykey.md)

### Web-testing-environment 
The PTT-Makro-API can also be tested here: [https://api.proptechtools.de/makro-api.php](https://api.proptechtools.de/makro-api.php).
## I) PTT-Makro-API

* One of the following parameters must be passed:
  * address <br>(success probability less than 100% -> depending on address analysis)
  * latlng <br>(success probability 100%)
  * communityKey <br>(success probability 100%)
* textlength
  * Possible values: `< short | long >`
* fazit
  * Possible values: `< sehr_gut | gut | durchschnittlich | maessig | schlecht >`


### Postman examples

The PTT-Makro-API examples can also be found on [postman](https://documenter.getpostman.com/view/6392593/S1ETRGTx#149be5c6-8885-4ea1-be10-b2650dafe35e).

### Examples

* [GET-Request: Short Textlength by coordinates](examples/001-short_textlength_coordinations.md)
* [GET-Request: Long Textlength by address](examples/002-long_textlength_address.md)
* [GET-Request: Long Textlength by community key](examples/003-long_textlength_communitykey.md)
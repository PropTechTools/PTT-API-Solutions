# PTT-API-Solutions
End user manual for using the ptt api solutions

The "Macrolage" module enables the creation of a meaningful macro position description including all relevant and current economic and statistical key figures.

## PTT API: Macrolage

### Mandatory parameters for the GET-Request for accessing the PTT API 

* apiKey (your private api key)
* name (your username for the PTT API)
* requester ( currently not used, set to `customer`)
* One of the following parameters must be used:
  * address
  * latlng
  * communityKey
* textlength
  * Possible values: `< short | long >`
* fazit
  * `fazit` must be set if the textlength has the value ```long```
  * Possible values: `< sehr_gut | gut | durchschnittlich | maessig | schlecht >`


## Examples

* [GET-Request: Short Textlength with coordinations](examples/001-short_textlength_coordinations.md)
* [GET-Request: Long Textlength with address](examples/002-long_textlength_address.md)
* [GET-Request: Long Textlength with community key](examples/003-long_textlength_communitykey.md)




# PTT API-Solutions
End user manual for using the PTT API-Solutions

The "Macrolage" module enables the processing request of a meaningful macro location description including all relevant and current economic and statistical key figures for any desired community in Germany.

## PTT API: Macrolage

### 1) `D`eveloping and `T`esting `E`nvironment (DTE)

**Attention:** The user and api-key shown below belong to a test account whose request range is limited to five communities only. 
<br/>
<br/>
**Test-User:** test.user@proptechtools.de
<br/>
**Test-ApiKey:** gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU
<br/>
<br/>
<br/>
The following five communities are available in the DTE-system:

| community key   | city type | city name |   state    |
| -------------   |:-------------:|:-------------:|:-------------:|
| 072355007001     | community | Aach | Rheinland-Pfalz | 
| 083355001001     | city | Aach | Baden-Württemberg |
| 053340002002     | city | Aachen | Nordrhein-Westfalen |
| 081365001088     | city | Aalen | Baden-Württemberg |
| 064390001001     | community | Aarbergen | Hessen |


### 2) Live-System

Changing from DTE-System to Live-System, with access to the complete database, is easy:

* Delete the `dte` in URL: www.proptechapi.de/dte/macrolage/json... => www.proptechapi.de/macrolage/json...
* Update to your personal PTT-credentials:
    * apiKey (your private api key)
    * name (your username for the PTT API)

### Mandatory parameters for the GET-Request for accessing the PTT API 

* apiKey (your private api key)
* name (your username for the PTT API)
* requester ( currently not used, set to `customer`)
* One of the following parameters must be passed:
  * address
  * latlng
  * communityKey
* textlength
  * Possible values: `< short | long >`
* fazit
  * Possible values: `< sehr_gut | gut | durchschnittlich | maessig | schlecht >`

### Web-testing-environment 
The PTT API can also be tested with this [web testing environment](https://account.proptechtools.de/apitest.php).

### Postman examples

The PTT API examples can also be found on [postman](https://documenter.getpostman.com/view/6392593/S1ETRGTx#149be5c6-8885-4ea1-be10-b2650dafe35e).

### Examples

* [GET-Request: Short Textlength by coordinates](examples/001-short_textlength_coordinations.md)
* [GET-Request: Long Textlength by address](examples/002-long_textlength_address.md)
* [GET-Request: Long Textlength by community key](examples/003-long_textlength_communitykey.md)




# PTT API-Solutions
End user manual for using the PTT API-Solutions.

The "Macrolage" module enables the processing request of a meaningful macro location description including all relevant and current economic and statistical key figures for any desired community in Germany.

### 1) `D`eveloping and `T`esting `E`nvironment (DTE-System)

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

| community key   | city type | city name |   state    |   latlng    |
| -------------   |:-------------:|:-------------:|:-------------:|:-------------:|
| 072355007001     | community | Aach | Rheinland-Pfalz | 49.789503,6.590633 |
| 083355001001     | city | Aach | Baden-Württemberg | 47.840882,8.859067 |
| 053340002002     | city | Aachen | Nordrhein-Westfalen | 50.777180,6.093335 |
| 081365001088     | city | Aalen | Baden-Württemberg | 48.837336,10.094682 |
| 064390001001     | community | Aarbergen | Hessen | 50.245978,8.078530 |


### 2) Live-System

Changing from DTE-System to Live-System (with access to the complete database) is easy:

* Delete the `dte` in URL: www.proptechapi.de/dte/macrolage/json... => www.proptechapi.de/macrolage/json...
* Update to your personal PTT-credentials:
    * apiKey (your private api key)
    * name (your username for the PTT API)


### Obligatory parameters for the GET-Request for accessing every PTT API:

* apiKey (your private api key)
* name (your username for the PTT API)
* requester (as an option you can specify between individuel api-requests all using the same `apiKey` and `name` for comprehensibility and billing purposes, if not nessesary set to `customer` or leave empty)

### [I) PTT-Makro-API](ptt-makro-api.md)
### [II) PTT-Mikro-API](ptt-mikro-api.md)
### [III) PTT-Kartenset-API](ptt-kartenset-api.md)


### Web-testing-environment 
The PTT API can also be tested here: [https://api.proptechtools.de](https://api.proptechtools.de).

### Changelog
[Changelog](ptt-changelog.md) of API-Updates

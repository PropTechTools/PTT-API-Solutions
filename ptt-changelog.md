[<- back to overview](README.md)
***

## Changelog

* 2019-12-19 [v0.0.2.5] Makrolage-API: Resolving "textlength:long" Bug 
* 2019-12-21 [v0.0.2.7] Makrolage-API: Adding Wirtschaftsstruktur -> [updated Makrolage-API manuel](ptt-makro-api.md)
* 2020-01-03 [v0.0.2.7] Mikrolage-API: Adding data as api settingsparameter -> [updated Mikrolage-API manuel](ptt-mikro-api.md)
* 2020-01-03 [v0.0.2.7] Mikrolage-API: Changing advanced integrationparameters -> [updated Mikrolage-API manuel](ptt-mikro-api.md)
* 2020-01-03 [v0.0.2.7] Update obligatory parameters in micro_api_parameter.xlsx
* 2020-01-17 [v0.0.3.0] Bugfixes and automated backend bug analysis
* 2020-01-20 [v0.0.3.2] Adding explanation to [request](README.md)-Parameter
* 2020-02-09 [v0.0.4.1] Upgrading serverinfrastructur resulting in quicker requesttimes -> [updated requesttimes](ptt-mikro-api.md)
* 2020-02-23 [v0.0.4.1] Fix special character (ß to ss) in -> [micro_api_parameter.xlsx](doc/micro_api_parameter.xlsx)
* 2020-02-23 [v0.0.4.4] Fix parameterspelling (gastronomiebtrieb to gastronomiebterieb) in -> [micro_api_parameter.xlsx](doc/micro_api_parameter.xlsx)
* 2020-02-24 [v0.0.4.4] Changing stadtteilzentrum_check to stadtteilzentrum_naehe (both params will work) in [micro_api_parameter.xlsx](doc/micro_api_parameter.xlsx)
* 2021-02-13 [v0.0.7.4] Kartenset-API: Adding requestparameter (scale, compass, border, pois) -> [updated requestparameters](ptt-kartenset-api.md)
* 2021-03-22 [v0.0.7.4] Minor explainatory updates in integrationsmanual: Clearification of apikey, apiname, requester
* 2021-04-14 [v0.0.7.4] Mikrolage-API: Reducing obligatory requestparameter.`stadtzentrum`, `aerztliche_primaerversorgung_ort_koordinate` and `aperiodischer_bedarf_ort_koordinate` are not obligatory anymore.
* 2021-04-29 [v0.0.8.3] Bugfixes und Worttrennungsupdate "-/ " => "-"
* 2021-09-20 [v0.0.9.1] <br>- makrolage request parameters `communitykey` DEPRECATED <br>- makrolage request parameters `address` DEPRECATED<br> - removing `requester` as an option => becomes obligatory for order-api <br>- makrolage request parameter `address` is deprecated <br>- makrolage request parameter `communityKey` is deprecated <br>- refractoring all parameters of `objektkategorie`, all old parameters will continue working
* 2021-12-12 [v0.0.9.2] Adding request parameter `language` for Makrolage-API and Mikrolage-API

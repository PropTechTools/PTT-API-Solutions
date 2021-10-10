[<- back to overview](README.md)
***

## I) PTT-Makro-API
The "Macrolage" module enables the processing request of a meaningful macro location description including all relevant and current economic and statistical key figures for any desired community in Germany.

### Requestparameters:
Wirtschaftsstruktur is automatically analysed in communitys with a population larger then 15.000, but can be overwritten by requesting `wirtschaftsstruktur1`,`wirtschaftsstruktur2` and `wirtschaftsstruktur3`.

| Property 	| Input-Type 	| Mandatory? 	| Default 	| Possible Values 	|
|:---	|:---	|:---	|:---	|:---	|
| textlength 	| dropdown 	| <b>obligatory</b> 	| -	| `short`,`long` 	|
| fazit 	| dropdown	| optional 	| `""` 	| `""`,`sehr_gut`,`gut`,`mittel`,`maessig`,`schlecht` 	|
| wirtschaftsstruktur1 	| dropdown	| optional 	| `""` or automatically analysed 	| `""`,`keine_angabe`,`agrarwirtschaft`,`automobilindustrie`,`bahnindustrie`,`bergbau_und_rohstoffe`,`bio_und_gentechnologie`,`chemie_und_pharmazie`,`dienstleistung_und_handwerk`,`digitalwirtschaft`,`elektrotechnik_und_elektronikindustrie`,`energie_und_umwelt`,`ernaehrungsindustrie`,`feinkeramische_industrie`,`feinmechanik_und_optik`,`finanzwirtschaft`,`forschung_und_entwicklung`,`genussmittelindustrie`,`gesundheitswirtschaft`,`glasindustrie`,`handelsindustrie`,`high_tech_und_innovation`,`holz_und_moebelindustrie`,`informationstechnik_und_kommunikation`,`kautschukindustrie`,`kosmetikindustrie`,`kredit_und_versicherungsgewerbe`,`kultur_und_kreativwirtschaft`,`kunst_und_klebstoffindustrie`,`kunststoffindustrie`,`leder_warenindustrie`,`luft_und_raumfahrt`,`maritime_wirtschaft`,`maschinen_und_anlagenbau`,`medien_und_marketing`,`metallindustrie`,`papier_und_druckindustrie`,`pflegewirtschaft`,`post_und_kuriergewerbe`,`ruestungsindustrie`,`schliesssysteme_und_sicherheitstechnik`,`schmuckindustrie`,`schuhindustrie`,`spielwarenindustrie`,`sportwirtschaft`,`textilindustrie`,`tourismus_und_gastronomie`,`verkehr_und_logistik`,`verpackungsindustrie`,`werkstoffindustrie`,`wirtschaft_und_politik` 	|
| wirtschaftsstruktur2 	| dropdown	| optional 	| `""` or automatically analysed 	| `""`,`keine_angabe`,`agrarwirtschaft`,`automobilindustrie`,`bahnindustrie`,`bergbau_und_rohstoffe`,`bio_und_gentechnologie`,`chemie_und_pharmazie`,`dienstleistung_und_handwerk`,`digitalwirtschaft`,`elektrotechnik_und_elektronikindustrie`,`energie_und_umwelt`,`ernaehrungsindustrie`,`feinkeramische_industrie`,`feinmechanik_und_optik`,`finanzwirtschaft`,`forschung_und_entwicklung`,`genussmittelindustrie`,`gesundheitswirtschaft`,`glasindustrie`,`handelsindustrie`,`high_tech_und_innovation`,`holz_und_moebelindustrie`,`informationstechnik_und_kommunikation`,`kautschukindustrie`,`kosmetikindustrie`,`kredit_und_versicherungsgewerbe`,`kultur_und_kreativwirtschaft`,`kunst_und_klebstoffindustrie`,`kunststoffindustrie`,`leder_warenindustrie`,`luft_und_raumfahrt`,`maritime_wirtschaft`,`maschinen_und_anlagenbau`,`medien_und_marketing`,`metallindustrie`,`papier_und_druckindustrie`,`pflegewirtschaft`,`post_und_kuriergewerbe`,`ruestungsindustrie`,`schliesssysteme_und_sicherheitstechnik`,`schmuckindustrie`,`schuhindustrie`,`spielwarenindustrie`,`sportwirtschaft`,`textilindustrie`,`tourismus_und_gastronomie`,`verkehr_und_logistik`,`verpackungsindustrie`,`werkstoffindustrie`,`wirtschaft_und_politik` 	|
| wirtschaftsstruktur3 	| dropdown 	| optional 	| `""` or automatically analysed	| `""`,`keine_angabe`,`agrarwirtschaft`,`automobilindustrie`,`bahnindustrie`,`bergbau_und_rohstoffe`,`bio_und_gentechnologie`,`chemie_und_pharmazie`,`dienstleistung_und_handwerk`,`digitalwirtschaft`,`elektrotechnik_und_elektronikindustrie`,`energie_und_umwelt`,`ernaehrungsindustrie`,`feinkeramische_industrie`,`feinmechanik_und_optik`,`finanzwirtschaft`,`forschung_und_entwicklung`,`genussmittelindustrie`,`gesundheitswirtschaft`,`glasindustrie`,`handelsindustrie`,`high_tech_und_innovation`,`holz_und_moebelindustrie`,`informationstechnik_und_kommunikation`,`kautschukindustrie`,`kosmetikindustrie`,`kredit_und_versicherungsgewerbe`,`kultur_und_kreativwirtschaft`,`kunst_und_klebstoffindustrie`,`kunststoffindustrie`,`leder_warenindustrie`,`luft_und_raumfahrt`,`maritime_wirtschaft`,`maschinen_und_anlagenbau`,`medien_und_marketing`,`metallindustrie`,`papier_und_druckindustrie`,`pflegewirtschaft`,`post_und_kuriergewerbe`,`ruestungsindustrie`,`schliesssysteme_und_sicherheitstechnik`,`schmuckindustrie`,`schuhindustrie`,`spielwarenindustrie`,`sportwirtschaft`,`textilindustrie`,`tourismus_und_gastronomie`,`verkehr_und_logistik`,`verpackungsindustrie`,`werkstoffindustrie`,`wirtschaft_und_politik` 	|

### Useful Documents:
  * [wirtschaftsstruktur_parameters.xlsx](doc/wirtschaftsstruktur_parameter.xlsx).

### Postman Examples

The PTT-Makro-API examples can also be found on [postman](https://documenter.getpostman.com/view/6392593/S1ETRGTx#149be5c6-8885-4ea1-be10-b2650dafe35e).

### Examples

* [GET-Request: Short Textlength by coordinates](examples/makro-api-001-short_textlength_coordinations.md)
* [GET-Request: Long Textlength by address](examples/makro-api-002-long_textlength_address.md)
* [GET-Request: Long Textlength by community key](examples/makro-api-003-long_textlength_communitykey.md)

### Web-testing-environment 
The PTT-Makro-API can also be tested here: [https://api.proptechtools.de/makro-api.php](https://api.proptechtools.de/makro-api.php).

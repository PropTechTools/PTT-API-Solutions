[<- back to overview](README.md)
***

## III) PTT-Kartenset-API

### Mandatory parameters

* latlng 
* ResponseType `<data | doc>`<br>
   -> data: returning map-images base64 decoded
   -> doc: returning a word-document<br>

### Optional parameters
 * address (automated address analysis based on coordinates is overwritten by optional address)

### Examples

* [GET-Request: Kartenset-Data](examples/kartenset-api-001-data.md)

### Web-testing-environment 
The PTT-Kartenset-API can also be tested here: [https://api.proptechtools.de/kartenset-api.php](https://api.proptechtools.de/kartenset-api.php).
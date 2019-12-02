
//Saving Apidata to object
function collectData(){
    //Init Params
    api_req = {
        bewertungsobjekt:"50.771279,6.085676",
        stadtzentrum:"50.775396,6.086234"
    };
    $('.save').each(function(){
        if(this.value != ""){
            if (this.type == "checkbox"){
                api_req[this.id] = this.checked;
            } else {
                api_req[this.id] = $('#'+this.id).val();
            }    
        }
    });
    console.log(api_req)
};


//visualising of processingtime between request and response (processingtime around 10 sec)
function countDown(htlm_elem){
    var counter = 10;
    
    var interval = setInterval(function() {
        counter--;
        if(counter < 0) {
            htlm_elem.text("SUCCESS")
            clearInterval(interval);
        } else {
            htlm_elem.text("Text wird in "+counter.toString()+" sek angezeigt")
        }
        
    }, 1000);
}


function microlage_search(div, url) {
    collectData();

    //Credentials
    //var apikey = "gI1Nl-ikJsboXBKJqnW-V1fz2rJYOzQ4zg93Y8PU";
    //var apiname = "test.user@proptechtools.de";

    var apikey = "8KbLCekddVEie7Vg1_qPWFL-C6EUtT6Mz9X-_5E6";
    var apiname = "sYp4kEAtyUnH67K";

	//Requestername - For billing purposes; 
	var apirequester = "PropTechTools_GmbH"
    
  
    URL_PARAM = "";
    for (let [key, value] of Object.entries(api_req)) {
        URL_PARAM += key+"="+value+"&"
    }
    
    URL = "https://www.proptechapi.de/6461766964/microlage/json?"+
    "apiKey="+apikey+
    "&name="+apiname+
    "&requester="+apirequester+
    "&"+URL_PARAM
   
    console.log(URL)

    url.html("<a href="+URL+" target='_blank'>"+URL+"</a>");
    
    countDown($('#microlage_btn'))
    $.getJSON(URL, function(data) {
        console.log(data.message)
        if (data.success == true){
            div.html(data.data.html_text);
            console.log(data.data.html_text);
            //return;
        } else {
            div.html(data.message);
            console.log(data)
            //return;
        }
    })

}
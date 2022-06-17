// var office=['kedoya', 'bandung', 'joglo', 'aceh', 
//             'biro semarang', 'makasar', 'transmisi semarang', 
//             'transmisi surabaya', 'transmisi denpasar', 
//             'transmisi yogyakarta'];

// var office="";

function checkOffice() {
    // office = document.getElementById('officeName').value;
    
    document.getElementById("getLocationContent").style.display="block";
}

$(document).ready(function(){
    $('.dropdown').click(function(){
        if($(this).hasClass('expand')){
            $('ul').slideUp(function(){
                $('.dropdown').removeClass('expand');
                $('.fas').removeClass('expand'); 

            })
        }

        else {
            $(this).addClass('expand');
            setTimeout(function(){
                $('.fas').addClass('expand'); 
                $('ul').stop().slideDown();
            },200);
        }
    });
});

var kedoyaLat =  -6.186957018673723;
var kedoyaLong = 106.7585642800948;
var acehLat = 5.5096526;
var acehLong = 95.3475721;

var x = document.getElementById("location");
var y = document.getElementById("distance");
var z = document.getElementById("office");

function getLocation() {
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
} else {
    x.innerHTML = "Geolocation is not supported by this browser.";
}
}

//compare distance as the crow flies
function calcCrow(lat1, lon1, lat2, lon2) 
{
    var R = 6371; // km
    var dLat = toRad(lat2-lat1);
    var dLon = toRad(lon2-lon1);
    var lat1 = toRad(lat1);
    var lat2 = toRad(lat2);
    
    var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
    var d = R * c;
    return d;
}

// Converts numeric degrees to radians
function toRad(Value) 
{
    return Value * Math.PI / 180;
}

function showPosition(position) {
x.innerHTML = "Latitude: " + position.coords.latitude +
"<br>Longitude: " + position.coords.longitude;
y.innerHTML = "Your distance to " + selectedOffice + " office is: " + 
(calcCrow(acehLat, acehLong, position.coords.latitude, position.coords.longitude).toFixed(1)) +
" km";

}

/*--------------------------------------*/
var selectedOffice;
const btn = document.querySelector('#btn');        
const radioButtons = document.querySelectorAll('input[name="option"]');
btn.addEventListener("click", () => {
    // let selectedOffice;
    for (const radioButton of radioButtons) {
        if (radioButton.checked) {
            selectedOffice = radioButton.value;
            
            // window.location.href="GetLocation.php?selectedOffice='Kedoya'";
            break;
        }
    }
    
    getLocation();
});

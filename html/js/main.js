function getDate() {
    var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];

    var date = new Date();

    document.getElementById("time").innerHTML = date.toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
    document.getElementById("day").innerHTML = date.toLocaleDateString('en-US', {weekday: 'long'})
    document.getElementById("date").innerHTML = date.toLocaleDateString('en-US', {year: 'numeric', month: 'short', day: 'numeric'});

    var t = setTimeout(getDate, 500);
}

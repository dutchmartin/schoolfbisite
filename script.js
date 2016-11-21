function ganaarland(){
var dropdown = document.getElementById("countries");
var value = dropdown.options[dropdown.selectedIndex].value;
window.location.href = "./land.php?country=" + value;
}

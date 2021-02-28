$('#tableDepartments').hide()
$('#tableLocations').hide()


document.getElementById("btnradio1").addEventListener("click", function() {
    $('#tableDepartments').hide()
    $('#tableLocations').hide()
    $('#tableStaff').show()
  });

document.getElementById("btnradio2").addEventListener("click", function() {
  $('#tableStaff').hide()
  $('#tableLocations').hide()
  $('#tableDepartments').show()
});

document.getElementById("btnradio3").addEventListener("click", function() {
    $('#tableStaff').hide()
    $('#tableDepartments').hide()
    $('#tableLocations').show()
  });
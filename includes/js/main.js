$('#tableDepartments').hide()
$('#tableLocations').hide()


document.getElementById("btnradio1").addEventListener("click", function() {
    $('#tableDepartments').hide()
    $('#tableLocations').hide()
    $('#tableContainer').removeClass("col-md-3")
    $('#tableContainer').removeClass("col-md-6")
    $('#tableContainer').addClass("col-md-9")
    $('#tableStaff').show()
    
  });

document.getElementById("btnradio2").addEventListener("click", function() {
  $('#tableStaff').hide()
  $('#tableLocations').hide()
  $('#tableContainer').removeClass("col-md-9")
  $('#tableContainer').removeClass("col-md-3")
  $('#tableContainer').addClass("col-md-6")
  $('#tableDepartments').show()

});

document.getElementById("btnradio3").addEventListener("click", function() {
    $('#tableStaff').hide()
    $('#tableDepartments').hide()
    $('#tableContainer').removeClass("col-md-9")
    $('#tableContainer').removeClass("col-md-6")
    $('#tableContainer').addClass("col-md-3")
    $('#tableLocations').show()
  });

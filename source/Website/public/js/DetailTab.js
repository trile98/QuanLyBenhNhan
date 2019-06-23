function openTab(evt, tabName) {
  // Declare all variables
  var i, detailTabcontent, detailTablinks;

  // Get all elements with class="detailTabcontent" and hide them
  detailTabcontent = document.getElementsByClassName("detailTabcontent");
  for (i = 0; i < detailTabcontent.length; i++) {
    detailTabcontent[i].style.display = "none";
  }

  // Get all elements with class="detailTablinks" and remove the class "active"
  detailTablinks = document.getElementsByClassName("detailTablinks");
  for (i = 0; i < detailTablinks.length; i++) {
    detailTablinks[i].className = detailTablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

$(document).ready(function() {
	$('.detailTablinks.default').click();
  
});
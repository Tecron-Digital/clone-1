
function makeRequest(
  type,
  url,
  showLoading,
  isFormData,
  formId,
  callback
) {
  var response = "";
  var formData = "";
  var age = 0;
  var loadingScreen = document.querySelector(".loading");


  var xhttp = new XMLHttpRequest();
  xhttp.open(type, url, true);

  if (isFormData == true) {
    formId = document.querySelector(formId);
    formData = new FormData(formId);
  }
  else{
    formData = formId
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  }
  xhttp.send(formData);
  if(showLoading == true){
loadingScreen.style.display = "block";
  }


  xhttp.onload = function () {
    var response = this.responseText;
  loadingScreen.style.display = "none";
    callback(response);
  };

}


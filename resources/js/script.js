
function openLoginPopup() {
  if (document.getElementById("loginPopUpID").style.display == "block") {
      document.getElementById("loginPopUpID").style.display = "none"
  } else {
      document.getElementById("loginPopUpID").style.display = "block"
  }
}


function closeLoginBtnPressed() {
    document.getElementById("loginPopUpID").style.display = "none";
}


function openAccountBtnDropdown() {
  if (document.getElementById("accountBtnDropdownID").style.display == "block") {
    document.getElementById("accountBtnDropdownID").style.display = "none"
} else {
    document.getElementById("accountBtnDropdownID").style.display = "block"
}
}
function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

function enableProfileEdit(input) {
  document.getElementById(input).disabled = false;
  document.getElementById("submitEditBtn").style.display = "block";
  if(input == "state") {
    document.getElementById("statePlaceholder").disabled = true;
  }
} 

function validatePassword(){
  var password = document.getElementById("password")
, confirm_password = document.getElementById("reenterPassword");
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

function closeConfirmEditBtnPressed() {
  document.getElementById("editConfirmPopUpID").style.display = "none";

}

function openConfirmEdit() {
  document.getElementById("editConfirmPopUpID").style.display = "block";
 
}
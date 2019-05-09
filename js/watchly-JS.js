
function pwdToggle(){
    var x = document.getElementById("pwd");
    var i = document.getElementById("pwdIcon");
    if (x.type === "password") {
      x.type = "text";
      i.className = i.className.replace("fas fa-eye", "fas fa-eye-slash");
    } else {
      x.type = "password";
      i.className = i.className.replace("fas fa-eye-slash", "fas fa-eye");
    }
}
function checkForm() {
    var forms = document.getElementsByClassName('validate-form');
    var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
}

function showMessage() {
    var msg = document.getElementById("cong-alert");
    msg.classList.remove("collapse");
    event.preventDefault();
    event.stopPropagation();
}

function showAlert() {
    var form = document.getElementById("val-form");
    var isValidForm = form.checkValidity();
    if (isValidForm == true) {
        showMessage();
    }
    checkForm();
}

function checkUser() {
    var user = document.getElementById("loginUsername").value;
    var pass = document.getElementById("loginPassword").value;
    console.log(pass);
    if (user.length > 0 && pass.length > 0) {
        if (user != "Gabo" || pass != "Qwerty123") {
            showMessage();
        }
    }
    checkForm();
}

function checkPassword() {
    var pass = document.getElementById("password").value;
    var pass2 = document.getElementById("password2").value;
    var fMsg = document.getElementById("fail-alert");
    if (pass.length > 0 && pass2.length > 0) {
        if (pass === pass2) {
            fMsg.classList.add("collapse");
            showMessage();
        }
        else {
            fMsg.classList.remove("collapse");
            event.preventDefault();
            event.stopPropagation();
        }
    }
    checkForm();
}
function ck() {
    var ul = document.URL;
    ul = ul.indexOf(".kr");
    ul = ul * 30;
    if (ul == pw.input_pwd.value) {
        alert("Password is " + ul * pw.input_pwd.value);
    } else {
        alert("Wrong");
    }
}

function init() {
var a = document.getElementById("a"),
    b = document.getElementById("b"),
    c = document.getElementById("c");

a.onkeyup = function() {
    if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
        b.focus();
    }
}

b.onkeyup = function() {
    if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
        c.focus();
    }
}
}
window.onload = init;
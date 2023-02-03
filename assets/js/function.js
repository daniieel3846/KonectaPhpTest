function confirmar() {
    var answer = confirm("¿Deseas eliminar el producto?");
    if (answer) {
        return true;
    } else {
        return false;
    }
}
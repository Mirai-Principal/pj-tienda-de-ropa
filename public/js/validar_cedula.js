function ValidarCI() {

  var CI = document.getElementById("ci").value;
  var dig, aux, par = 0, mult, imp = 0, Suma, div, da;
  for (var i = 0; i < 9; i++) {
    aux = i + 1;
    if ((aux % 2) == 0) {
      dig = parseInt(CI.substr(i, 1));
      par = par + dig;
    } else {
      dig = parseInt(CI.substr(i, 1));
      mult = dig * 2;
      if (mult > 9) {
        mult = mult - 9;
      }
      imp = imp + mult;
    }
  }
  da = parseInt(CI.substr(9, 1));
  Suma = par + imp;
  div = Suma % 10;
  if (div != 0) {
    div = 10 - div;
  }
  if (div == da) {
    alert('La cédula fue ingresada correctamente');
  } else {
    alert('La cédula fue ingresada incorrectamente');
  }
}

function myFunction() {
  var input, filter, table, div, p, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myGrid");
  div = table.getElementsByTagName("div");
  for (i = 0; i < div.length; i++) {
    p = div[i].getElementsByTagName("p")[0];
    if (p) {
      txtValue = p.textContent || p.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        div[i].style.display = "";
      } else {
        div[i].style.display = "none";
      }
    }       
  }
}

function myFunction() {
  var input, filter, grid, div, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  grid = document.getElementById("myGrid");
  div = grid.getElementsByTagName("div");
  for (i = 0; i < div.length; i++) {
      p = div.getElementsByTagName("p")[0];
      if(p){
        if (p.innerHTML.toUpperCase().indexOf(filter) > -1) {
          div[i].style.display = "";
        } else {
          div[i].style.display = "none";
        }
      }
  }       
}

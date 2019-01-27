



function adaugaInBazaDeDate(){
    var title = document.getElementById("title").value;

    if(document.getElementById("title").value == '' || document.getElementById("price").value == ''
    || document.getElementById("specialCharacteristics").value == '' || document.getElementById("condition").value == ''
    || document.getElementById("endDate").value == '' || document.getElementById("category").value == ''
    || document.getElementById("country").value == '' || document.getElementById("description").value == '' || document.getElementById("image").value=='')
   alert("Please complete all fields !");
else {

      let xhr2 = new XMLHttpRequest();
    xhr2.open("POST", "http://localhost/ProiectTW/MVC/public/SellItem/adaugaInDB");
    xhr2.addEventListener("load", function loadCallback() {
        switch (xhr2.status) {
            case 200:
                console.log("Success, ai inserat in baza de date" + xhr2.response);
                break;
            case 404:
                console.log("Oups! Not found");
                break;
        }
    });
    xhr2.addEventListener("error", function errorCallback() {
        console.log("Network error");
    });
    let payload = {
      title: `${title}`,
      price: `${price}`,
      specialCharacteristics: `${specialCharacteristics}`,
      condition: `${condition}`,
      endDate: `${endDate}`,
      category: `${category}`,
      country: `${country}`,
      image: `${image}`,
      description: `${description}`
        }
    xhr2.send(JSON.stringify(payload));
      }
}
const sub = document.querySelectorAll(".sub");
const add = document.querySelectorAll(".add");

const counterSpan = document.querySelectorAll(".counter");
const cardDiv = document.querySelectorAll(".card");
const prezzoSpan = document.querySelectorAll(".prezzo");
const prezzoAllUnita = document.querySelectorAll(".prezzoInit");
let count = [];

//* add and subtract count(er) handler
// it works ONLY if there is an equal number of add and sub buttons (and counters)
for (let i = 0; i < sub.length; i++) {
  count[i] = 0;
  //let prezzoComodo = parseFloat(prezzoAllUnita[i].innerHTML); /* / 2*/

  let dishName = counterSpan[i].name;
  //alert(dishName);
  let hiddenTag = `<input type="hidden" name="${dishName}" class="hidden-input${i}" value="0">`;

  cardDiv[i].insertAdjacentHTML("beforeend", hiddenTag);

  let hiddenInput = document.querySelector(`.hidden-input${i}`);

  //* click on .sub
  sub[i].addEventListener("click", () => {
    if (count[i] > 0) {
      count[i]--;
    }

    counterSpan[i].innerHTML = count[i];
    hiddenInput.value = count[i];
    if (prezzoSpan[i].innerHTML > 0) {
      prezzoSpan[i].innerHTML =
        parseFloat(prezzoSpan[i].innerHTML) -
        parseFloat(prezzoAllUnita[i].innerHTML);
    }
  });

  //* click on .add
  add[i].addEventListener("click", () => {
    count[i]++;

    counterSpan[i].innerHTML = count[i];
    hiddenInput.value = count[i];
    prezzoSpan[i].innerHTML =
      parseFloat(prezzoSpan[i].innerHTML) +
      parseFloat(prezzoAllUnita[i].innerHTML);
  });
}

/*document
  .querySelector(".card")
  .insertAdjacentHTML(
    "beforeend",
    '<a class="delete-cookies betweenPages torna-home" style="cursor: pointer;">DELETE ALL COOKIES</a>'
  );

let deleteCookiesLink = document.querySelector(".delete-cookies");

deleteCookiesLink.addEventListener("click", () => {
  deleteAllCookies();
});

function setCookie(name, value, expirydays) {
  var d = new Date();
  d.setTime(d.getTime() - expirydays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = name + "=" + value + ";-1";
}

function deleteCookie(name) {
  setCookie(name, "0", -3600);
}

function deleteAllCookies() {
  var cookies = document.cookie.split(";");

  for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i];
    var eqPos = cookie.indexOf("=");
    var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
    document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
  }
}

function deleteertAllCookies() {
  var cookies = document.cookie.split(";");
  alert(cookies);
  for (var i = 0; i < cookies.length; i++) {
    deleteCookie(cookies[i].split("=")[0]);
    alert("hei [" + cookies[i].split("=")[0] + "] hei");
  }
}
*/

const sub = document.querySelectorAll(".sub");
const add = document.querySelectorAll(".add");
const counterSpan = document.querySelectorAll(".counter");
const containerDiv = document.querySelectorAll(".container");
const prezzoSpan = document.querySelectorAll(".prezzo");
const prezzoAlLitro = document.querySelectorAll(".prezzoInit");
let count = [];

//* add and subtract count(er) handler
// it works ONLY if there is an equal number of add and sub buttons (and counters)
for (let i = 0; i < sub.length; i++) {
  count[i] = 0;
  //initValuePrezzo += prezzoSpan[i].innerHTML;

  let dishName = counterSpan[i].name;
  let hiddenTag = `<input type="hidden" name="${dishName}" class="hidden-input${i}" value="0">`;

  containerDiv[i].insertAdjacentHTML("beforeend", hiddenTag);

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
        parseInt(prezzoSpan[i].innerHTML) -
        parseInt(prezzoAlLitro[i].innerHTML) / 2;
    }
  });

  //* click on .add
  add[i].addEventListener("click", () => {
    count[i]++;

    counterSpan[i].innerHTML = count[i];
    hiddenInput.value = count[i];
    prezzoSpan[i].innerHTML =
      parseInt(prezzoSpan[i].innerHTML) +
      parseInt(prezzoAlLitro[i].innerHTML) / 2;
  });
}

/*
function setCookie(name, value, expirydays) {
  var d = new Date();
  d.setTime(d.getTime() + expirydays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = name + "=" + value + ";-1";
}

function deleteCookie(name) {
  setCookie(name, "0", -1);
}

function deleteAllCookies() {
  var cookies = document.cookie.split(";");
  for (var i = 0; i < cookies.length; i++)
    deleteCookie(cookies[i].split("=")[0]);
}
*/

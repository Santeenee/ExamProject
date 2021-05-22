// not working
const containerDiv = document.querySelectorAll(".container");
let count = 0;

containerDiv.forEach((container) => {
  container.addEventListener("click", (e) => {
    ++count;
    alert(count);
  });
});

for (let i = 0; i < containerDiv.length; i++) {
  containerDiv[i].addEventListener("click", (e) => {
    ++count;
    alert(count);
  });
}

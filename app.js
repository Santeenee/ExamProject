const containerDiv = document.querySelectorAll(`.container`);
let count = 0;

containerDiv.forEach((container) => {
  container.addEventListener("click", (e) => {
    ++count;
    alert(count);
  });
});

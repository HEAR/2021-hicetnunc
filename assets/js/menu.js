let menuItems = document.querySelectorAll(".menu");
let gap = 3;
let heightPerMenu = (93 - ((menuItems.length-1)  * gap)) / menuItems.length;
let currentTop = heightPerMenu;

menuItems.forEach((item, i) => {
  if (!item.classList.contains("active")) {
    let top = getRandomInt(currentTop, currentTop + heightPerMenu);
    item.style.top = top + "vh";
    currentTop = currentTop + heightPerMenu + gap;
    let left = getRandomInt(3,57);
    item.style.left = left + "vw";
  }
});

function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min;
}

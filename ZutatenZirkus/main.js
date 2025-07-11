const portionsmenge = 4;
const zutatenMenge = 200;
const berechneteMenge = zutatenMenge * portionsmenge;

if (portionsmenge <= 0) {
  alert("Portionsmenge: " + portionsmenge);
} else {
  console.log(`Berechnete Portionsmenge: ${berechneteMenge}`);
}

const zutaten = [
  "Huhn",
  "Currypulver",
  "Kokos milch",
  "Ingwer",
  "Zwiebel",
  "Reis",
  "Zitronensaft",
  "Chili",
];
const mengen = [1, 10, 250, 2, 1, 200, 20, 0.5];
const einheiten = ["Stk.", "g", "ml", "ml", "Stk.", "g", "ml", "g"];
console.log(`Zutaten: ${zutaten[0]} ${mengen[0]} ${einheiten[0]}`);

for (let i = 0; i < zutaten.length; i++) {
  console.log(`Zutaten: ${zutaten[i]} ${mengen[i]} ${einheiten[i]}`);
}

const modal = document.querySelector(".modal");
const openModal = document.querySelector(".tooltip");
const closeModal = document.querySelector(".close-modal");
openModal.addEventListener("click", () => {
  modal.classList.toggle("hidden");
});

closeModal.addEventListener("click", () => {
  modal.classList.toggle("hidden");
});

modal.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.classList.toggle("hidden");
  }
});

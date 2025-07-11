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

const inputPortionen = document.getElementById("input-portionen");

inputPortionen.addEventListener("input", () => {
  const inputPortionenValue = Number(inputPortionen.value);
  inputPortionenValue <= 0
    ? alert(`Portionsmenge: ${inputPortionenValue} 
  Bitte geben Sie eine Zahl größer als 0 ein`)
    : updateIngredients(inputPortionenValue);
});

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

function updateIngredients(portionen) {
  const results = mengen.map((menge) => menge * portionen);
  const zutatenListe = document.querySelector(".reciept-liste");
  let ingredientsHTML =
    '<h2>Was du brauchst:</h2><div class="divider-line fullline"></div>' +
    zutaten
      .map((zutat, i) => {
        return `<p>${zutat} <span class="reciept-menge text-bold">${results[i]} ${einheiten[i]}</span></p>`;
      })
      .join("");

  zutatenListe.innerHTML = ingredientsHTML;
}

// Initialization with 1 portion
updateIngredients(1);

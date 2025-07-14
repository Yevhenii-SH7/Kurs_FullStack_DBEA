let zutaten, mengen, einheiten;

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

fetch("ingridient.json")
  .then(response => response.json())
  .then(data => {
    zutaten = data.map(item => item.zutaten);
    mengen = data.map(item => item.mengen);
    einheiten = data.map(item => item.einheiten);
    updateIngredients(1);
  });

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

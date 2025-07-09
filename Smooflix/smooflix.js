const API_URL = "https://storage01.dbe.academy/fswd/api-smoothie-mixer/";

async function fetchSmoothieData(searchSmooth) {
  try {
    const response = await fetch(
      `${API_URL}?smoothiename=${encodeURIComponent(searchSmooth)}`
    );

    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

    const { data } = await response.json();

    document.getElementById("smoothie-details-container").innerHTML = `
            <h2>${data.name}</h2>
            <img src="${data.image}" alt="Smoothie" style="max-width: 100px;">
            <p id="smoothie-taste">${data.taste}</p>
            <p><strong>Zutaten:</strong></p>
            <ul>${data.ingredients
              .map((ingredient) => `<li>${ingredient}</li>`)
              .join("")}</ul>
        `;
  } catch (error) {
    console.error("Fehler:", error);
  }
}

document.getElementById("search-button").addEventListener("click", () => {
  const searchSmooth = document.getElementById("search-input").value.trim();
  if (searchSmooth) fetchSmoothieData(searchSmooth);
});

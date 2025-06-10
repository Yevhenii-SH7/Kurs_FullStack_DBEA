const API_URL = "https://storage01.dbe.academy/fswd/travel-api.php";

// Function to extract airport code
function getAirportCode(location) {
  const airPortCode = location.split(' ');
  return airPortCode[1] ? airPortCode[1].replace(/[()]/g, '') : location;
}

function formatPrice(price) {
  return price.replace(" EUR", ' <span class="currency">EUR</span>');
}

function createFlightCard(flight, index) {
  const card = document.createElement("div");
  card.className = "flight-card";
  card.dataset.index = index;

  card.innerHTML = `
        <div class="flight-info">
            <div>
            <p><strong>Startzeit:</strong> ${flight.startZeit}</p>
            <p><strong>Von:</strong> ${getAirportCode(flight.start)}</p>
            <p><strong>Stopps:</strong> ${flight.stops === 0 ? "Keine" : flight.stops}</p>
            <p><strong>Endzeit:</strong> ${flight.endZeit}</p>
            <p><strong>Nach:</strong> ${getAirportCode(flight.ziel)}</p>
            <p><strong>Terminal:</strong> ${flight.terminal}</p>
            </div>
            <p><strong>Dauer:</strong> ${flight.flugdauer}</p>
            
        </div>
        <div class="price-section">
            <p><strong>Economy:</strong> ab <span class="price">${formatPrice(flight.preis.economy)}</span></p>
            <p><strong>Business:</strong> ab <span class="price">${formatPrice(flight.preis.business)}</span></p>
        </div>
    `;

  return card;
}

function displayFlights(container, flightsToShow) {
  container.innerHTML = "";

  if (flightsToShow.length === 0) {
    container.innerHTML = "<p>Keine Flüge gefunden</p>";
    return;
  }

  flightsToShow.forEach((flight, index) => {
    container.appendChild(createFlightCard(flight, index));
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("Suchen-modal");
  const closeModalBtn = modal.querySelector(".close");
  const modalSection = document.getElementById("modal-section");
  const form = document.querySelector("#content1 form");
  const vonInput = document.getElementById("von");
  const nachInput = document.getElementById("nach");

  // Bearbeitung von Formularen
  form.addEventListener("submit", async function (event) {
    event.preventDefault();

    const vonValue = vonInput.value.trim();
    const nachValue = nachInput.value.trim();
    const datumInput = document.getElementById("hinflug");
    const datumValue = datumInput ? datumInput.value : "";

    if (!vonValue || !nachValue || !datumValue) {
      modalSection.innerHTML = "<p>Bitte geben Sie Start-, Zielort und Datum ein.</p>";
      modal.style.display = "block";
      return;
    }

    modal.style.display = "block";
    modalSection.innerHTML = "<p>Lade Flüge...</p>";

    try {
      const url = `${API_URL}?start=${encodeURIComponent(vonValue)}&ziel=${encodeURIComponent(nachValue)}&datum=${encodeURIComponent(datumValue)}`;
      console.log('Requesting URL:', url);
      
      const response = await fetch(url);
      console.log('Response status:', response.status);
      
      const data = await response.json();
      console.log('Received data:', data);
      
      if (data.fehler) {
        modalSection.innerHTML = `<p>${data.fehler}</p>`;
        return;
      }
      
      const flights = Array.isArray(data) ? data : Object.values(data);
      
      if (!flights || flights.length === 0) {
        modalSection.innerHTML = "<p>Keine Flüge gefunden</p>";
        return;
      }
      // Ergebnisse
      displayFlights(modalSection, flights);
    } catch (error) {
      console.error('Error details:', error);
      modalSection.innerHTML = "<p>Fehler. Bitte versuchen Sie es später.</p>";
    }
  });

  
  closeModalBtn.addEventListener("click", () => {
    modal.style.display = "none";
    document.body.style.overflow = "";
  });

  
  window.addEventListener("click", (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});

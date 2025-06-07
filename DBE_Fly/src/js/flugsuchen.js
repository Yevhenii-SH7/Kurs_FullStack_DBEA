const flights = [
  {
    start: "Stuttgart (STR)",
    ziel: "Frankfurt (FRA)",
    stops: 0,
    flugdauer: "1h 10m",
    preis: {
      business: "350 EUR",
      economy: "150 EUR",
    },
    terminal: "T1",
  },
  {
    start: "Stuttgart (STR)",
    ziel: "Berlin (BER)",
    stops: 0,
    flugdauer: "1h 25m",
    preis: {
      business: "400 EUR",
      economy: "180 EUR",
    },
    terminal: "T2",
  },
  {
    start: "Stuttgart (STR)",
    ziel: "München (MUC)",
    stops: 0,
    flugdauer: "1h 05m",
    preis: {
      business: "370 EUR",
      economy: "160 EUR",
    },
    terminal: "T1",
  },
  {
    start: "Stuttgart (STR)",
    ziel: "Hamburg (HAM)",
    stops: 1,
    flugdauer: "2h 45m",
    preis: {
      business: "450 EUR",
      economy: "200 EUR",
    },
    terminal: "T3",
  },
  {
    start: "Stuttgart (STR)",
    ziel: "Düsseldorf (DUS)",
    stops: 0,
    flugdauer: "1h 20m",
    preis: {
      business: "380 EUR",
      economy: "170 EUR",
    },
    terminal: "T1",
  },
  {
    start: "Stuttgart (STR)",
    ziel: "Zürich (ZRH)",
    stops: 0,
    flugdauer: "1h 10m",
    preis: {
      business: "390 EUR",
      economy: "180 EUR",
    },
    terminal: "T2",
  },
  {
    start: "Stuttgart (STR)",
    ziel: "Wien (VIE)",
    stops: 1,
    flugdauer: "2h 15m",
    preis: {
      business: "420 EUR",
      economy: "190 EUR",
    },
    terminal: "T1",
  },
  {
    start: "Stuttgart (STR)",
    ziel: "Paris (CDG)",
    stops: 0,
    flugdauer: "1h 30m",
    preis: {
      business: "430 EUR",
      economy: "200 EUR",
    },
    terminal: "T3",
  },
  {
    start: "Stuttgart (STR)",
    ziel: "Amsterdam (AMS)",
    stops: 0,
    flugdauer: "1h 35m",
    preis: {
      business: "440 EUR",
      economy: "210 EUR",
    },
    terminal: "T2",
  },
  {
    start: "Stuttgart (STR)",
    ziel: "Madrid (MAD)",
    stops: 1,
    flugdauer: "3h 15m",
    preis: {
      business: "500 EUR",
      economy: "250 EUR",
    },
    terminal: "T1",
  },
];

// Function to create a single flight card
function createFlightCard(flight, index) {
  const card = document.createElement("div");
  card.className = "flight-card";
  card.dataset.index = index;

  card.innerHTML = `
        <div class="flight-info">
            <div><p><strong>Von:</strong> ${flight.start}</p>
<p><strong>Stopps:</strong> ${flight.stops === 0 ? "Keine" : flight.stops}</p>
            <p><strong>Nach:</strong> ${flight.ziel}</p>
            <p><strong>Terminal:</strong> ${flight.terminal}</p>
            </div>
            <p><strong>Dauer:</strong> ${flight.flugdauer}</p>
            
        </div>
        <div class="price-section">
            <p><strong>Economy:</strong> </n> ab <span class="price">${flight.preis.economy.replace(
              " EUR",
              ' <span class="currency">EUR</span>'
            )}</span></p>
<p><strong>Business:</strong></n> ab <span class="price">${flight.preis.business.replace(
    " EUR",
    ' <span class="currency">EUR</span>'
  )}</span></p>
        </div>
    `;

  return card;
}

// Function to display flights in container
function displayFlights(container, flightsToShow) {
  container.innerHTML = "";

  if (flightsToShow.length === 0) {
    container.innerHTML = "<p>Keine Flüge gefunden</p>";
    return;
  }

  flightsToShow.forEach((flight, index) => {
    container.appendChild(createFlightCard(flight, index));
  });

  console.log(`Displayed ${flightsToShow.length} flight cards`);
}

// Initialize modal functionality
document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("Suchen-modal");
  const openModalBtn = document.getElementById("open-modal");
  const closeModalBtn = modal.querySelector(".close");
  const modalSection = document.getElementById("modal-section");
  const form = document.querySelector("#content1 form");
  const vonInput = document.getElementById("von");
  const nachInput = document.getElementById("nach");

  if (
    !modal ||
    !openModalBtn ||
    !closeModalBtn ||
    !modalSection ||
    !form ||
    !vonInput ||
    !nachInput
  ) {
    console.error("Required elements not found");
    return;
  }

  // Handle form submission and modal opening
  form.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission

    const vonValue = vonInput.value.trim().toLowerCase();
    const nachValue = nachInput.value.trim().toLowerCase();

    const filteredFlights = flights.filter((flight) => {
      const flightStart = flight.start.toLowerCase();
      const flightZiel = flight.ziel.toLowerCase();
      return (
        (!vonValue || flightStart.includes(vonValue)) &&
        (!nachValue || flightZiel.includes(nachValue))
      );
    });

    // Open modal and display flights
    modal.style.display = "block";
    document.body.style.overflow = "hidden";
    displayFlights(modalSection, filteredFlights);
  });

  // Close modal
  closeModalBtn.addEventListener("click", () => {
    modal.style.display = "none";
    document.body.style.overflow = "";
  });

  // Close modal when clicking outside
  window.addEventListener("click", (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
      document.body.style.overflow = "";
    }
  });
});

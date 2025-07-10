const portionsmenge = 4;
const zutatenMenge = 200;
const berechneteMenge = zutatenMenge * portionsmenge;

if(portionsmenge <= 0) {
    alert("Portionsmenge: " + portionsmenge);
} else {
console.log(`Berechnete Portionsmenge: ${berechneteMenge}`);
}

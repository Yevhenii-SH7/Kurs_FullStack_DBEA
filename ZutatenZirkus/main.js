const portionsmenge = 4;
const zutatenMenge = 200;
const berechneteMenge = zutatenMenge * portionsmenge;

if(portionsmenge <= 0) {
    alert("Portionsmenge: " + portionsmenge);
} else {
console.log(`Berechnete Portionsmenge: ${berechneteMenge}`);
}

const zutaten = ["Huhn", "Currypulver", "Kokos milch", "Ingwer", "Zwiebel", "Reis", "Zitronensaft", "Chili"];
const mengen = [1, 10, 250, 2, 1, 200, 20, 0.5];
const einheiten = ["Stk.", "g", "ml", "ml", "Stk.", "g", "ml", "g"];
console.log(`Zutaten: ${zutaten[0]} ${mengen[0]} ${einheiten[0]}`);

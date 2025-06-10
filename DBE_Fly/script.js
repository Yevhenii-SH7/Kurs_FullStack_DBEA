let price = 19.5;

let cid = [
  ['PENNY', 0.5],
  ['NICKEL', 0],
  ['DIME', 0],
  ['QUARTER', 0],
  ['ONE', 0],
  ['FIVE', 0],
  ['TEN', 0],
  ['TWENTY', 0],
  ['ONE HUNDRED', 0]
];

let cash = document.getElementById('cash');
const btn = document.getElementById('purchase-btn');
const changeDue = document.getElementById('change-due');

const currencyUnit = {
  'PENNY': 0.01,
  'NICKEL': 0.05,
  'DIME': 0.10,
  'QUARTER': 0.25,
  'ONE': 1.00,
  'FIVE': 5.00,
  'TEN': 10.00,
  'TWENTY': 20.00,
  'ONE HUNDRED': 100.00
};

btn.addEventListener('click', function () {
  let cashNum = Number(cash.value);
  let change = +(cashNum - price).toFixed(2);

  if (cashNum < price) {
    alert("Customer does not have enough money to purchase the item");
    changeDue.textContent = "";
    return;
  }

  if (cashNum === price) {
    changeDue.textContent = "No change due - customer paid with exact cash";
    return;
  }

  let changeArray = [];
  let isClosed = true;
  
  // Check if drawer is empty
  for (let [_, total] of cid) {
    if (total > 0) {
      isClosed = false;
      break;
    }
  }

  for (let i = cid.length - 1; i >= 0; i--) {
    const [name, total] = cid[i];
    const value = currencyUnit[name];
    let available = total;
    let amount = 0;

    while (change >= value && available >= value) {
      change = +(change - value).toFixed(2);
      available = +(available - value).toFixed(2);
      amount = +(amount + value).toFixed(2);
    }

    if (amount > 0) {
      changeArray.push([name, amount]);
    }
  }

  if (change > 0) {
    changeDue.textContent = "Status: INSUFFICIENT_FUNDS";
    return;
  }

  // Формируем вывод
  let result = isClosed ? "Status: CLOSED " : "Status: OPEN ";
  changeArray.forEach(([name, amount]) => {
    result += `${name}: $${amount.toFixed(2)} `;
  });

  changeDue.textContent = result.trim();
});
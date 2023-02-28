use runners_crisps;

db.codes.drop();
db.users.drop()

// Function to generate random 10 digit hex code
function generate10DigitHexCode() {
    let result = [];
    let hexRef = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f'];

    for (let n = 0; n < 10; n++) {
        result.push(hexRef[Math.floor(Math.random() * 16)]);
    }
    return result.join('');
}

const codes = [];
const ensureRandomCodes = new Set();
let footballs = 10;

// Generates 1 million unique codes ( 1000 for testing)
for (let index = 0; index < 1_000; index++) {
    let code = generate10DigitHexCode();
    while (!ensureRandomCodes.has(code)) {
        code = generate10DigitHexCode();
    }

    let footballVoucher = false;

    if (footballs > 0) {
        footballVoucher = true;
        footballs--;
    }

    ensureRandomCodes.add(code);
    codes.push({ '_id': index, 'code': code, 'used': false, 'football': footballVoucher });
}

// Generate the vouchers
db.codes.insertMany(codes);


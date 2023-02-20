use runners_crisps;

db.competition.drop();
db.users.drop()

// Generate the vouchers
db.competition.insertMany([
    { '_id': 1, 'code': '1241afafsa' }
]);

db.competition.find({})
db.users.find({})
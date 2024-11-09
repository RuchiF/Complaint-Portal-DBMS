const yourModel = require('./models/Student'); // Import your model

// Test a find operation
yourModel.findAll()
    .then(result => console.log("Find All Results:", result))
    .catch(error => console.error("Error in findAll:", error));

// Test an insert operation
// yourModel.create({ name: "Test Name", ... })
//     .then(result => console.log("Insert Result:", result))
//     .catch(error => console.error("Error in create:", error));
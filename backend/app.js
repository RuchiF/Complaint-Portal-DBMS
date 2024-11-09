const express = require('express');
const bodyParser = require('body-parser');
const db = require('./db/connect');
const complaintRoutes = require('./routes/complainRoutes');


const app = express();
app.use('/complaints', complaintRoutes);

const PORT = process.env.PORT || 3000;

app.use(bodyParser.json());
// app.use('/complaints', complaintsRoutes);

// app.use()

app.listen(PORT, ()=>{
    console.log(`Server is running on ${PORT}`);
});
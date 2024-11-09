// app.js
const express = require("express");
const bodyParser = require("body-parser");
const complaintsRoutes = require("./routes/complaints");
const leaveRoutes = require("./routes/leave");

const app = express();
const PORT = process.env.PORT || 3000;

app.use(bodyParser.json());
app.use("/complaints", complaintsRoutes);
app.use("/leave", leaveRoutes);

app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});

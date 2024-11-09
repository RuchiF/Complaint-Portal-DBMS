// routes/complaints.js
const express = require("express");
const router = express.Router();
const db = require("../db/connect");

// POST /complaints - Register a new complaint
router.post("/", (req, res) => {
  const { complaint_id, status, description, date } = req.body;
  const query =
    "INSERT INTO complaint (complaint_id , status , description ,date) VALUES (?, ?,?,?)";
  db.query(query, [complaint_id, status, description, date], (err, result) => {
    if (err) return res.status(500).send(err);
    res.status(201).json({
      message: "Complaint registered successfully",
      id: result.insertId,
    });
  });
});

// GET /complaints - Retrieve all complaints
router.get("/", (req, res) => {
  const query = "SELECT * FROM complaint";
  db.query(query, (err, results) => {
    if (err) return res.status(500).send(err);
    res.status(200).json(results);
  });
});

module.exports = router;

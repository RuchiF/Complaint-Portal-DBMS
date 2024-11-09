// routes/complaints.js
const express = require("express");
const router = express.Router();
const db = require("../db/connect");

// POST /complaints - Register a new complaint
router.post("/", (req, res) => {
  const { leave_id, type, start_date, end_date, reason } = req.body;
  const query =
    "INSERT INTO student_leave (leave_id , type , start_date ,end_date , reason) VALUES (?, ?,?,?,?)";
  db.query(
    query,
    [leave_id, type, start_date, end_date, reason],
    (err, result) => {
      if (err) return res.status(500).send(err);
      res.status(201).json({
        message: "Leave registered successfully",
        id: result.insertId,
      });
    }
  );
});

// GET /complaints - Retrieve all complaints
router.get("/", (req, res) => {
  const query = "SELECT * FROM student_leave";
  db.query(query, (err, results) => {
    if (err) return res.status(500).send(err);
    res.status(200).json(results);
  });
});

module.exports = router;

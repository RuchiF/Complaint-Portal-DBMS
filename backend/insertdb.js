require("dotenv").config(); // Load environment variables
const mysql = require("mysql2");

const con = mysql.createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD || "", 
    database: process.env.DB_NAME,
});

con.connect(function (err) {
  if (err) throw err;
  console.log("Connected!");

  const sql = `
    INSERT INTO student(name , roll_no, room_no, hostel_name, block, phone_no) VALUES ('Lakshmi' ,'23BCS148', 'A-04', 'Nagarjuna', 'A', 8349988290);
  `;

  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("1 record inserted");
    con.end(); 
  });
});

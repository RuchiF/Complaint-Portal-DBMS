const { DataTypes } = require('sequelize');
const sequelize = require('../db/connect');
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');

const Student = sequelize.define('Student', {
    name: { type: DataTypes.STRING },
    roll_no: { type: DataTypes.STRING, primaryKey: true},
    room_no: { type: DataTypes.STRING },
    hostel_name: { type: DataTypes.STRING },
    block: { type: DataTypes.STRING },
    phone_no: { type: DataTypes.STRING },
    password: { type: DataTypes.STRING },
}, {
    tableName: 'student',
    timestamps: false,
});

Student.beforeCreate(async (user) => {
  if (user.password) {
    user.password = await bcrypt.hash(user.password, 10);
  }
});

Student.prototype.comparePassword = async function (password) {
  return bcrypt.compare(password, this.password);
};

Student.prototype.createJWT = function () {
  return jwt.sign(
    { id: this.id, hostel_name: this.hostel_name, roll_no: this.roll_no },
    'your_jwt_secret', 
    { expiresIn: '1d' }
  );
};

module.exports = Student;

import React, { useState } from 'react';
import './addComplaint.css'

const AddComplaint = () => {
  const [formData, setFormData] = useState({
    name: '',
    rollNumber: '',
    hostelName: 'Maa Saraswati', 
    blockName: 'Block-A',
    roomNumber: '',
    staff: '', 
    description: '',
    date: new Date().toISOString().split('T')[0] 
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log('Complaint Data:', formData);
    alert('Complaint Submitted!');
  };

  return (
    <div className = "form_fill" style={{ margin: '20px' }}>
      <h2>Add Complaint</h2>
      <form onSubmit={handleSubmit}>
        <div>
          <label>Name:</label>
          <input
            type="text"
            name="name"
            value={formData.name}
            onChange={handleChange}
            required
          />
        </div>

        <div>
          <label>Roll Number:</label>
          <input
            type="text"
            name="rollNumber"
            value={formData.rollNumber}
            onChange={handleChange}
            required
          />
        </div>

        <div>
          <label>Hostel Name:</label>
          <select
            name="hostelName"
            value={formData.hostelName}
            onChange={handleChange}
          >
            <option value="Maa Saraswati">Maa Saraswati</option>
            <option value="Nagarjuna">Nagarjuna</option>
          </select>
        </div>

        <div className="block_name">
          <label>Block Name:</label>
          <select
            name = "blockName"
            value = {formData.blockName}
            onChange = {handleChange}>
            <option value = "Block-A">Block-A</option>    
            <option value = "Block-B">Block-B</option>    
            <option value = "Block-C">Block-C</option>    
          </select>
        </div>

        <div className="room_number">
          <label>Room Number:</label>
          <input
            type="text"
            name="roomNumber"
            value={formData.roomNumber}
            onChange={handleChange}
            required
          />
        </div>

        <div class_name = "staff">
          <label>Concerned Staff:</label>
          <select
            name="staff"
            value={formData.worker}
            onChange={handleChange}
          >
            <option value="Plumber">Plumber</option>
            <option value="Electrician">Electrician</option>
            <option value="Carpenter">Carpenter</option>
            <option value="CC Staff">CC Staff</option>
            <option value="Others">Any Other</option>
          </select>
        </div>

        <div className = "problem_description">
          <label>Description:</label>
          <textarea
            name = "description"
            value = {formData.description}
            onChange = {handleChange}
            rows = "5"
            placeholder = "Describe your issue here"
          />
        </div>

        <div className = "date">
          <label>Date of Complaint:</label>
          <input
            type="date"
            name="date"
            value={formData.date}
            readOnly
          />
        </div>

        <div className="submit_button">
          <button type="submit">Submit Complaint</button>
        </div>
      </form>
    </div>
  );
};

export default AddComplaint;
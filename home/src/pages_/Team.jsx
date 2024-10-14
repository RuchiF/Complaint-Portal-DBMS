import React from 'react';
import './Taem.css';
import Navbar from "../components_/navbar.jsx";

const Team = () => {
  const teamMembers = [
    { name: 'Ruchi Fatechandani', contact: '+123-456-7890', linkedin: '#' },
    { name: 'Lakshmi Priya', contact: '+123-456-7891', linkedin: '#' },
    { name: 'Snigdha Gupta', contact: '+123-456-7892', linkedin: '#' },
    { name: 'Vanisha Garg', contact: '+123-456-7893', linkedin: '#' },
    { name: 'Akshita Mishra', contact: '+123-456-7894', linkedin: '#' },
  ];

  return (
    <>
    <Navbar/>
    <div className="team-section">
      <h2 className="fancy-header">Meet Our Amazing Team</h2>
      <div className="team-grid">
        {teamMembers.map((member, index) => (
          <div className="team-member-card" key={index}>
            <div className="member-details">
              <h3>{member.name}</h3>
              <p>{member.role}</p>
              <p>Contact: {member.contact}</p>
              <div className="linkedin-circle">
                <a href={member.linkedin} target="_blank" rel="noopener noreferrer">
                  in
                </a>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
    </>
  );
};

export default Team;

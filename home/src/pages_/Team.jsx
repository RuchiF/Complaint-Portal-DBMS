import React from 'react';
import './Taem.css';
import Navbar from "../components_/navbar.jsx";

const Team = () => {
  const teamMembers = [
    { name: 'Ruchi Fatechandani', contact: '9522564464', linkedin: 'https://www.linkedin.com/in/ruchi-fatehchandani-290338280/' },
    { name: 'Lakshmi Priya', contact: '8349977292', linkedin: 'https://www.linkedin.com/in/lakshmi-priya-itsmelps/' },
    { name: 'Snigdha Gupta', contact: '+123-456-7892', linkedin: 'https://www.linkedin.com/in/snigdhagupta-sg/' },
    { name: 'Vanisha Garg', contact: '8851140177', linkedin: 'https://www.linkedin.com/in/vanisha-garg-a2a52028b/' },
    { name: 'Akshita Mishra', contact: '8448068030', linkedin: 'https://www.linkedin.com/in/akshita-mishra-350bb7289/' },
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

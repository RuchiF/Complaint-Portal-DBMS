import React from 'react';
import './Status.css';
import Navbar from "../components_/navbar.jsx";

const ComplaintItem = ({ complaint, status }) => (
    <div className="complaint-item">
        <div className="complaint-text">{complaint}</div>
        <div className="status-icon">
            {status ? '✔️' : '❌'}
        </div>
    </div>
);

const StatusItem = ({ icon, label }) => (
    <div className="status-item">
        <div className="icon">{icon}</div>
        <div className="label">{label}</div>
    </div>
);

const StatusCard = ({ title, icon, status, complaints, contact }) => (
    <div className="status-card">
        <div className="card-header">
            <div className="icon-circle">{icon}</div>
            <h3>{title}</h3>
        </div>
        <div className="status-list">
            {complaints.map((complaint, index) => (
                <ComplaintItem key={index} complaint={complaint.text} status={complaint.status} />
            ))}
            <div className="contact-info">
                <h4>Contact:</h4>
                <p>{contact}</p>
            </div>
        </div>
    </div>
);

const StatusTracking = () => {
    const statusData = [
        {
            title: 'Plumber',
            icon: '🔧',
            complaints: [
                { text: 'Leaky faucet in room 101', status: true },
                { text: 'Clogged drain in room 203', status: false },
                { text: 'Pipe burst in basement', status: true }
            ],
            contact: 'Plumber: (555) 123-4567'
        },
        {
            title: 'Electrician',
            icon: '💡',
            complaints: [
                { text: 'Power outage in room 304', status: true },
                { text: 'Light flickering in hall', status: false },
                { text: 'Broken switch in kitchen', status: true }
            ],
            contact: 'Electrician: (555) 234-5678'
        },
        {
            title: 'Carpenter',
            icon: '🛠',
            complaints: [
                { text: 'Broken chair in lounge', status: false },
                { text: 'Damaged door in room 407', status: true },
                { text: 'Loose shelf in storage', status: false }
            ],
            contact: 'Carpenter: (555) 345-6789'
        }
    ];

    return (
        <>
        <Navbar/>
        <div className="status-tracking">
            <h2>Status Tracking</h2>
            <div className="status-card-container">
                {statusData.map((card, index) => (
                    <StatusCard
                        key={index}
                        title={card.title}
                        icon={card.icon}
                        complaints={card.complaints}
                        contact={card.contact}
                    />
                ))}
            </div>
        </div>
        </>
    );
};

export default StatusTracking;

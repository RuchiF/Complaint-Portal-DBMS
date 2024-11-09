import "./Navbar.css";

const Navbar = () => {
  return (
    <nav className="navbar">
      <div className="navbar-logo">
        <a href="/">ComplaintPortal</a>
      </div>
      <div className="navbar-links">
        <a href="/home">Home</a>
        <a href="/about">About</a>
        <a href="/login">Login</a>
        <a href="/team">Team</a>
        <a href="/status">Status-Tracking</a>
        <a href="/feedback">Feedback</a>
        <a href="/addComplaint">Add Complaint</a>
        <a href="/noticeBoard">Notice Board</a>
        <a href="/contact">Contact Us</a>
        <a href="/faq">FAQ</a>
      </div>
    </nav>
  );
};

export default Navbar;

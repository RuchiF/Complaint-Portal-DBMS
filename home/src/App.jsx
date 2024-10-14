// import React from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Home from "./pages_/Home.jsx";
import Login from "./pages_/Login.jsx";
import Signup from "./pages_/Signup.jsx";
import Status from "./pages_/StatusTracking.jsx";
import Feedback from "./pages_/Feedback.jsx";
<<<<<<< HEAD
import Team from "./pages_/Team.jsx"
=======
import Complaint from "./pages_/addComplaint.jsx";
>>>>>>> 5a6f0424e59314e5f3876e20f6f3f3984bacaa28
function App() {
  return (
    <Router>
      <Routes>
        <Route index element={<Home />} /> {/* index means default page */}
        <Route path="/home" element={<Home />} />
        <Route path="/login" element={<Login />} />
        <Route path="/signup" element={<Signup />} />
        <Route path="/status" element={<Status />} />
<<<<<<< HEAD
        <Route path="/team" element={<Team />} />
        <Route path="/feedback" element={<Feedback />} />
=======
        <Route path="/status" element={<Status />} />
        <Route path="/addComplaint" element={<Complaint />} />
>>>>>>> 5a6f0424e59314e5f3876e20f6f3f3984bacaa28
        <Route path="*" element={<Home />} />
        {/* asteric(*) means anything other than these page */}
      </Routes>
    </Router>
  );
}

export default App;

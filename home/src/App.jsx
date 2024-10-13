// import React from "react";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import Home from "./pages_/Home.jsx";
import Login from "./pages_/Login.jsx";
import Signup from "./pages_/Signup.jsx";
function App() {
  return (
    <Router>
      <Routes>
        <Route index element={<Home />} /> {/* index means default page */}
        <Route path="/home" element={<Home />} />
        <Route path="/login" element={<Login />} />
        <Route path="/signup" element={<Signup />} />
        <Route path="*" element={<Home />} />
        {/* asteric(*) means anything other than these page */}
      </Routes>
    </Router>
  );
}

export default App;

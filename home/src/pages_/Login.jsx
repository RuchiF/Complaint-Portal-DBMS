import Login from "../components_/login.jsx";
import Navbar from "../components_/navbar.jsx";
import "./Login.css";
function LogIn() {
  return (
    <>
      <Navbar />
      <div className="login-page-wrapper">
        <Login />
      </div>
    </>
  );
}
export default LogIn;

import Signup from "../components_/signup.jsx";
import Navbar from "../components_/navbar.jsx";
import "./Signup.css";

function SignUp() {
  return (
    <>
      <Navbar />
      <div className="signup-page-wrapper">
        <Signup />
      </div>
    </>
  );
}

export default SignUp;

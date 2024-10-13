// import React from "react";
import "./login.css";

const Login = () => {
  return (
    <div className="login-container">
      <h1 className="title">Login</h1>
      <form className="login-form">
        <label htmlFor="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label htmlFor="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <button type="submit" className="submit-button">
          Login
        </button>
        <p>
          Do not have an account? <a href="/signup">Sign up!</a>
        </p>
      </form>
    </div>
  );
};

export default Login;

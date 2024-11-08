import "./signup.css";

const Signup = () => {
  return (
    <div className="signup-container">
      <h1 className="title">Sign Up</h1>
      <form className="signup-form">
        <label htmlFor="username">Username:</label>
        <input type="text" id="username" name="username" required />

        <label htmlFor="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label htmlFor="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <button type="submit" className="submit-button">
          Sign Up
        </button>
        <p>
          Alreay have an account? <a href="/login"> Login!</a>
        </p>
      </form>
    </div>
  );
};

export default Signup;

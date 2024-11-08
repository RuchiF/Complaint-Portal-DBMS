import React, { useState } from "react";
import { FaCommentDots } from "react-icons/fa";
import "./feedback.css";
import Navbar from "../components_/navbar";
const Feedback = () => {
  const [selectedEmoji, setSelectedEmoji] = useState(null);

  const emojis = [
    { emoji: "😃", meaning: "Happy" },
    { emoji: "🙂", meaning: "Content" },
    { emoji: "😐", meaning: "Neutral" },
    { emoji: "☹️", meaning: "Sad" },
    { emoji: "😡", meaning: "Angry" },
  ];

  return (
    <>
      <Navbar />
      <div className="feed-cont">
        <div className="header">
          <FaCommentDots size={40} style={{ color: "rgb(15, 8, 14)" }} />
          <h1 className="headtext">Feedback</h1>
        </div>
        <h1 className="ftext">How are you feeling?</h1>
        <h3 className="text-sm">
          Your input is valuable in helping us better understand your needs and
          tailor our service accordingly.
        </h3>

        <div className="emoji-slider">
          {emojis.map((item, index) => (
            <div
              key={index}
              className={`emoji-item ${
                selectedEmoji === index ? "selected" : ""
              }`}
              onClick={() => setSelectedEmoji(index)}
              title={item.meaning}
            >
              {item.emoji}
            </div>
          ))}
        </div>

        <textarea
          className="comment-box"
          placeholder="Add your comment here..."
        ></textarea>
        <button className="submit">Submit</button>
      </div>
    </>
  );
};

export default Feedback;

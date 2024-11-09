import React, { useState } from "react";
import "./NoticeBoard.css";

const NoticeBoard = () => {
  const [notices, setNotices] = useState([]);
  const [newNoticeText, setNewNoticeText] = useState("");
  const [pdfFiles, setPdfFiles] = useState([]);

  const addTextNotice = () => {
    if (newNoticeText.trim()) {
      setNotices([...notices, { type: "text", content: newNoticeText }]);
      setNewNoticeText("");
    }
  };

  const addPdfNotices = () => {
    const newPdfNotices = Array.from(pdfFiles).map((file) => ({
      type: "pdf",
      content: URL.createObjectURL(file),
      name: file.name,
    }));
    setNotices([...notices, ...newPdfNotices]);
    setPdfFiles([]);
  };

  const handleFileChange = (event) => {
    setPdfFiles(event.target.files);
  };

  const removeNotice = (index) => {
    setNotices(notices.filter((_, i) => i !== index));
  };

  const clearNotices = () => {
    setNotices([]);
  };

  return (
    <div className="notice-board">
      <h2>Notice Board</h2>

      <div className="notice-input">
        <input
          type="text"
          placeholder="Enter a new text notice..."
          value={newNoticeText}
          onChange={(e) => setNewNoticeText(e.target.value)}
        />
        <button onClick={addTextNotice}>Add Text Notice</button>
      </div>

      <div className="file-input">
        <input type="file" accept=".pdf" multiple onChange={handleFileChange} />
        <button onClick={addPdfNotices}>Add PDF Notice(s)</button>
      </div>

      <button className="clear-board" onClick={clearNotices}>
        Clear Board
      </button>

      <ul className="notices">
        {notices.length === 0 ? (
          <p>No notices available</p>
        ) : (
          notices.map((notice, index) => (
            <li key={index} className="notice-item">
              {notice.type === "text" ? (
                <span>{notice.content}</span>
              ) : (
                <a href={notice.content} target="_blank" rel="noopener noreferrer">
                  {notice.name}
                </a>
              )}
              <button onClick={() => removeNotice(index)}>Remove</button>
            </li>
          ))
        )}
      </ul>
    </div>
  );
};

export default NoticeBoard;

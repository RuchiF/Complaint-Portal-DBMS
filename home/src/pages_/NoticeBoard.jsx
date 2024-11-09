import NoticeBoard from "../components_/noticeboard.jsx";
import Navbar from "../components_/navbar.jsx";
import "./NoticeBoard.css";

function noticeboard() {
  return (
    <>
      <Navbar />
      <div className="noticeboard-page-wrapper">
        <NoticeBoard />
      </div>
    </>
  );
}

export default noticeboard;

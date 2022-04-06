import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Homepage from "../pages/Home";

const MainRouter = () => {
  return (
      <Router>
        <Routes>
          {/* ------------------------------  PUBLIC ROUTES  -------------------------------- */}
          <Route path="/" element={<Homepage />} />
        </Routes>
      </Router>
  );
};

export default MainRouter;

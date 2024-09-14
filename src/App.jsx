import './App.css'
import FingerprintAuth from './components/FingerprintAuth'
import { BrowserRouter as Router, Route, Routes, Link } from 'react-router-dom';
import UserDetails from './components/UserDetails'
import AgroSignup from './components/AgroSignup';
import AgroLogin from './components/AgroLogin';
import Otp from './components/Otp';

function App() {
  return (
    // Router component to manage routing within the application
    <Router>
      {/* Routes component to define different routes and their corresponding components */}
      <Routes>
        {/* Route for fingerprint authentication page */}
        <Route path="/farmerAuth" element={<FingerprintAuth />} />
        
        {/* Route for user details page */}
        <Route path="/userDetails" element={<UserDetails />} />
        
        {/* Route for user signup page */}
        <Route path="/signup" element={<AgroSignup />} />
        
        {/* Route for OTP verification page */}
        <Route path="/otp" element={<Otp />} />
        
        {/* Default route for user login page */}
        <Route path="/" element={<AgroLogin />} />
      </Routes>
    </Router>
  );
}
export default App

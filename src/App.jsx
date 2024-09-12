import './App.css'
import FingerprintAuth from './components/FingerprintAuth'
import { BrowserRouter as Router, Route, Routes, Link } from 'react-router-dom';
import UserDetails from './components/UserDetails'
import AgroSignup from './components/AgroSignup';
import AgroLogin from './components/AgroLogin';
import Otp from './components/otp';

function App() {

  return (
    <Router>
      <Routes>
        <Route path="/farmerAuth" element={<FingerprintAuth />} />
        <Route path="/userDetails" element={<UserDetails />} />
        <Route path="/signup" element={< AgroSignup />} />
        <Route path="/otp" element={< Otp />} />
        <Route path="/" element={< AgroLogin />} />
      </Routes>
    </Router>
  )
}

export default App

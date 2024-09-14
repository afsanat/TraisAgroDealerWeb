import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import App from './App.jsx'
import './index.css'
import "tw-elements-react/dist/css/tw-elements-react.min.css";

createRoot(document.getElementById('root')).render(
  // Wrapping the App component with StrictMode for additional checks and warnings during development
  <StrictMode>
    <App />
  </StrictMode>,
)



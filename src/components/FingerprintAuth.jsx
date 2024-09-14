import React, { useEffect, useState } from 'react';
import {  useNavigate } from 'react-router-dom';
import { renderSignInButton } from '../constants/esignateConstants';

// Define the FingerprintAuth functional component
const FingerprintAuth = () => {
  // State to hold user information
  const [userInfo, setUserInfo] = useState(null);

  // Hook to get the navigate function for programmatic navigation
  const navigate = useNavigate();

  // useEffect hook to perform side effects when the component mounts
  useEffect(() => {
    // Mock user details object
    const mockUserDetails = {
      "Allowed Fertilizers in Kgs": 200,
      "Allowed Seeds in kgs": 100,
      "Allowed Pesticides in kgs": 300,
      "Bought Seeds in kgs": 0,
      "Bought Fertilizers in kgs": 0,
      "Bought Pesticides in kgs": 0,
    };

    // Update local state with mock user details
    setUserInfo(mockUserDetails);

    // Store the mock user details in local storage as a JSON string
    localStorage.setItem('userInfo', JSON.stringify(mockUserDetails));

    // Call the function to render the sign-in button
    renderSignInButton();
  }, []); // Empty dependency array means this effect runs only once after the initial render

  // Component render
  return (
    <div className="">
      <div className="p-4 flex justify-between items-center">
          <img
            className="w-32"
            src="/logoTrais.png"
            alt="logo"
          />
          <button
            type="button"
            className="inline-block rounded-full bg-neutral-800 px-6 py-2 text-xs font-medium uppercase text-neutral-50 shadow-md transition duration-150 ease-in-out hover:bg-neutral-700 focus:outline-none focus:ring-2 focus:ring-neutral-500 active:bg-neutral-900"
            onClick={() => navigate('/')}
          >
            Logout
          </button>
        </div>
      <div className="m-10">
        <h1 className="text-4xl font-bold text-gray-800 mb-6 text-center relative overflow-hidden">
          <span className="absolute inset-0 bg-gradient-to-r from-green-100 to-green-800 opacity-50 blur-lg -z-10"></span>
          <p className='text-3xl p-10'>
            <div>
              Smart Traceable Agriculture
              </div>        
            </p>
        </h1> 
        <div className=" flex flex-col gap-10 mb-3 items-center justify-center">
            <p className=" text-gray-700">Click the button below to verify user using e-signate</p>

              <div id="sign-in-with-esignet"></div>

            <p className="text-gray-500 mt-2">promoting fraud free input subsidy programs.</p>    
        </div>   
      
      </div>
    </div>
  );
};

export default FingerprintAuth;



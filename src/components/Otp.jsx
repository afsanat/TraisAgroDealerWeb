import React, { useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { renderSignInButton } from '../constants/esignateConstants';

const Otp = () => {
  const navigate = useNavigate();

  useEffect(()=>{
    const mockUserDetails = {
      "Allowed Fertilizers in Kgs": 200,
      "Allowed Seeds in kgs": 100,
      "Allowed Pesticides in kgs": 300,
      "Bought Seeds in kgs": 20,
      "Bought Fertilizers in kgs": 12,
      "Bought Pesticides in kgs": 0,
      };
      localStorage.setItem('userInfo', JSON.stringify(mockUserDetails));
      renderSignInButton()
  },[])


  return (
    <div className="container">
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
            <p className="mb-4 mt-0 text-base font-light leading-relaxed">
              OTP - Confirm the following order by having the farmer verify their identity using e-signate.
          </p>
            <div className="flex flex-col">
              <div className="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div className="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                  <div className="overflow-hidden">
                    <table className="min-w-full text-center text-sm font-light">
                      <thead
                        className="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
                        <tr>
                          <th scope="col" className=" px-6 py-4">#</th>
                          <th scope="col" className=" px-6 py-4">Seeds in Kgs</th>
                          <th scope="col" className=" px-6 py-4">Fertilizers in Kgs</th>
                          <th scope="col" className=" px-6 py-4">Pesticide in Kgs</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr className="border-b dark:border-neutral-500">
                          <td className="whitespace-nowrap  px-6 py-4 font-medium">1</td>
                          <td className="whitespace-nowrap  px-6 py-4">20</td>
                          <td className="whitespace-nowrap  px-6 py-4">12</td>
                          <td className="whitespace-nowrap  px-6 py-4">0</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div> 
        <div className=" flex flex-col gap-10 mb-3 items-center justify-center">
              <div id="sign-in-with-esignet"></div>
            <p className="text-gray-500 mt-2">promoting fraud free input subsidy programs.</p>    
        </div>   
          
        </div>
    </div>
  );
};

export default Otp;

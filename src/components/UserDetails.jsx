import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import {
  TERipple,
  TEModal,
  TEModalDialog,
  TEModalContent,
  TEModalHeader,
  TEModalBody,
  TEModalFooter,
  TETabs,
  TETabsContent,
  TETabsItem,
  TETabsPane,
  TEChart ,
  TEInput
} from "tw-elements-react";

const UserDetails = () => {
  const navigate = useNavigate();
  const [showModal, setShowModal] = useState(false);
  const [basicActive, setBasicActive] = useState("tab1");

  const handleBasicClick = (value) => {
    if (value === basicActive) {
    return;
    }
    setBasicActive(value);
};

  const confirmOrder = () =>{
    navigate("/otp")
  }

  // Initial mock user details
  const initialUserDetails = JSON.parse(localStorage.getItem('userInfo')) || {};

  const [userDetails, setUserDetails] = useState(initialUserDetails);


  return (
    
    <div className="container mx-auto p-4">
       <div className="absolute top-4 left-4">
          <button
            onClick={() => navigate('/farmerAuth')}
            className="text-gray-600 hover:text-blue-500 bg-blue-100 transition-colors"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              className="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 19l-7-7 7-7"
              />
            </svg>
          </button>
        </div>
        <div className="bg-white rounded-lg shadow-lg overflow-hidden" style={{width: "700px"}}>
            <div className="relative">
                <img src="https://t3.ftcdn.net/jpg/07/38/63/14/360_F_738631427_i0Txuc3zh1r3DzAibqgg3lH8173H4xeG.jpg" alt="Cover Image" className="w-full h-48 object-cover"/>
                <div className="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black to-transparent">
                    <div className="flex items-center space-x-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/8847/8847419.png" alt="Profile Picture" className="w-24 h-24 rounded-full border-4 border-white"/>
                        <div className="text-white">
                            <h1 className="text-2xl font-bold">Mullah Hirwa</h1>
                            <p className="text-sm">Farmer</p>
                        </div>
                    </div>
                </div>
            </div>

            <div className="p-6">
                <h2 className="text-xl font-semibold mb-4">Smart Traceable Agriculture</h2>
                
                <div>
                  {/* <!-- Button trigger modal --> */}
                  <TERipple rippleColor="white">
                    <button
                      type="button"
                      className="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                      onClick={() => setShowModal(true)}
                    >
                      Buy Subsidy
                    </button>
                  </TERipple>

                  {/* <!-- Modal --> */}
                  <TEModal show={showModal} setShow={setShowModal}>
                    <TEModalDialog>
                      <TEModalContent>
                        <TEModalHeader>
                          {/* <!--Modal title--> */}
                          <h5 className="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200">
                            Buy Subsidy 
                          </h5>
                          {/* <!--Close button--> */}
                          <button
                            type="button"
                            className="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            onClick={() => setShowModal(false)}
                            aria-label="Close"
                          >
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              strokeWidth="1.5"
                              stroke="currentColor"
                              className="h-6 w-6"
                            >
                              <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                d="M6 18L18 6M6 6l12 12"
                              />
                            </svg>
                          </button>
                        </TEModalHeader>
                        {/* <!--Modal body--> */}
                        <TEModalBody>
                          <TEInput
                          type="number"
                          label="Seeds in kgs"
                          className="mb-4 p-2"
                        ></TEInput>
                        <TEInput
                          type="number"
                          label="Fertilizers in kgs"
                          className="mb-4 p-2"
                        ></TEInput>
                        <TEInput
                          type="number"
                          label="Pesticide in kgs"
                          className="mb-4 p-2"
                        ></TEInput>
                        </TEModalBody>
                        <TEModalFooter>
                          <TERipple rippleColor="light">
                            <button
                              type="button"
                              className="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                              onClick={() => setShowModal(false)}
                            >
                              Close
                            </button>
                          </TERipple>
                          <TERipple rippleColor="light">
                            <button
                              type="button"
                              className="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                              onClick={confirmOrder}
                            >
                              Place Order
                            </button>
                          </TERipple>
                        </TEModalFooter>
                      </TEModalContent>
                    </TEModalDialog>
                  </TEModal>
                </div>
              </div>
            <div className="p-6 bg-gray-50" >
            <div className="mb-3">
              <TETabs>
                <TETabsItem
                  onClick={() => handleBasicClick("tab1")}
                  active={basicActive === "tab1"}
                >
                  Statistics
                </TETabsItem>
                <TETabsItem
                  onClick={() => handleBasicClick("tab2")}
                  active={basicActive === "tab2"}
                >
                  Subsidy Information
                </TETabsItem>
              </TETabs>

              <TETabsContent className='mt-6'>
                <TETabsPane show={basicActive === "tab1"}>
                <div className='flex justify-center items-center w-full'>

                  <div className='w-80 items-center text-center'>
                    <TEChart
                      type="pie"
                      datalabels
                      data={{
                        labels: [
                          "Seeds",
                          "Fertilizers",
                          "Pesticide",
                        ],
                        datasets: [
                          {
                            label: "Total Subsidy (%)",
                            data: [23, 42, 35],
                            backgroundColor: [
                              "rgba(63, 81, 181, 0.5)",
                              "rgba(77, 182, 172, 0.5)",
                              "rgba(66, 133, 244, 0.2)",
                            ],
                          },
                        ],
                      }}
                    /> 
                  </div>
                </div>
                </TETabsPane>
                  <TETabsPane show={basicActive === "tab2"}>
                      <div className="space-y-4">
                          {Object.entries(userDetails).map(([key, value]) => (
                            
                            <div key={key} className="flex items-center space-x-4 bg-white p-4 rounded-lg shadow-sm   grid grid-cols-2 gap-4">
                              <span className="font-medium text-gray-600 capitalize">
                                {key.replace(/_/g, ' ')}
                              </span>
                              <span className="text-blue-800 text-sm">
                                  {value.toString()}
                              </span>
                            </div>
                          ))}
                      </div>
                  </TETabsPane>
              </TETabsContent>
            </div>   
            </div>
        </div>
    </div>

  )
};

export default UserDetails;

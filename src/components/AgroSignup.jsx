import React, { useState } from "react";
import { TEInput, TERipple, TEAlert } from "tw-elements-react";
import { useNavigate } from 'react-router-dom';

// Define the AgroSignup functional component
export default function AgroSignup(event) {
  // State to track whether the signup process is complete
  const [signedup, setSignedUp] = useState(false);

  // Hook to get the navigate function for programmatic navigation
  const navigate = useNavigate();

  // Handler function for form submission
  const handleSignUp = (event) => {
    event.preventDefault(); // Prevent the default form submission behavior

    // Find the closest form element from the event target
    const form = event.target.closest('form');
    
    // Check if the form is valid
    if (form.checkValidity()) {
      // Update state to indicate successful signup
      setSignedUp(true);

      // Simulate an API call or processing with a timeout
      setTimeout(() => {
        // Reset the signedUp state
        setSignedUp(false);

        // Navigate to the home page after a delay
        navigate('/');
      }, 1000); // Delay of 1 second before navigating
    } else {
      // If the form is not valid, trigger browser's built-in validation UI
      form.reportValidity();
    }
  };

  // Component render 
  return (
    <section className="h-full">
      <div className="container h-full p-10">
        {signedup && <TEAlert className="text-center" staticAlert open={true} color="bg-success-100 text-success-700">
                            Signup Was Successful.....
                        </TEAlert>}
        <div className="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
          <div className="w-full">
            <div className="block rounded-lg bg-white shadow-2xl dark:bg-neutral-800">
              <div className="g-0 lg:flex lg:flex-wrap">
                  <div className="md:mx-24 p-3 md:p-3">
                    {/* <!--Logo--> */}
                    <div className="text-center">
                      <img
                        className="mx-auto w-48"
                        src="/logoTrais.png"
                        alt="logo"
                      />
                    </div>

                    <form>
                      <p className="mb-4">SignUp Form</p>
                      {/* <!--Username input--> */}
                      <div className="grid grid-cols-2 gap-4">
                        <TEInput
                            type="text"
                            label="First Name"
                            className="mb-4 p-2"
                            required
                        ></TEInput>
                        <TEInput
                            type="text"
                            label="Last Name"
                            className="mb-4 p-2"
                            required
                        ></TEInput>
                      </div>
                      <TEInput
                        type="text"
                        label="Email"
                        className="mb-4 p-2"
                        required
                      ></TEInput>
                      <TEInput
                        type="text"
                        label="Address"
                        className="mb-4 p-2"
                        required
                      ></TEInput>

                      {/* <!--Password input--> */}
                      <TEInput
                        type="password"
                        label="Password"
                        className="mb-4 p-2"
                        required
                        />
                      <TEInput
                        type="password"
                        label="Confirm Password"
                        className="mb-4 p-2"
                        required
                        />


                      {/* <!--Submit button--> */}
                      <div className="mb-12 pb-1 pt-1 text-center">
                        <TERipple rippleColor="light" className="w-full">
                          <button
                            className="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
                            type="button"
                            style={{
                              background:
                                "linear-gradient(to right, #cbd394, #78921d, #6f8817, #7d9722)",
                            }}
                            onClick={handleSignUp}
                          >
                            Signup
                          </button>
                        </TERipple>
                      </div>

                      {/* <!--Login button--> */}
                      <div className="flex items-center justify-between pb-6">
                        <p className="mb-0 mr-2">Already have an account?</p>
                        <TERipple rippleColor="light">
                          <button
                            type="button"
                            className="inline-block rounded border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-green-600 hover:bg-danger-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-green-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-green-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                            onClick={() => navigate('/')}
                          >
                            Login
                          </button>
                        </TERipple>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>
  );
}
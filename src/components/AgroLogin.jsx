import React, { useState } from "react";
import { TEInput, TERipple } from "tw-elements-react";
import { useNavigate } from 'react-router-dom';

export default function AgroLogin() {
 const navigate = useNavigate();
 const [isLoading, setIsLoading] = useState(false);

 const handleLogin = (event) => {
  event.preventDefault(); 

  const form = event.target.closest('form');
  if (form.checkValidity()) {
    setIsLoading(true);

    setTimeout(() => {
     setIsLoading(false);

      navigate('/farmerAuth');
    }, 1000); 
  } else {
    form.reportValidity();
  }
  };

  return (
    <section className="h-full">
      <div className="container h-full p-10">
        <div className="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
          <div className="w-full">
            <div className="block rounded-lg bg-white shadow-2xl dark:bg-neutral-800">
              <div className="g-0 lg:flex lg:flex-wrap">
                {/* <!-- Left column container--> */}
                <div className="px-4 md:px-0 lg:w-6/12">
                  <div className="md:mx-6 md:p-12">
                    {/* <!--Logo--> */}
                    <div className="text-center">
                      <img
                        className="mx-auto w-48"
                        src="/logoTrais.png"
                        alt="logo"
                      />
                    </div>

                    <form>
                      <p className="mb-4">Enter your login credentials</p>
                      {/* <!--Username input--> */}
                      <TEInput
                        type="text"
                        label="Username"
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
                            onClick={handleLogin}
                          >
                            Log in
                          </button>
                        </TERipple>

                        {/* <!--Forgot password link--> */}
                        <a className="text-neutral-800" href="#!">Forgot password?</a>
                      </div>

                      {/* <!--Register button--> */}
                      <div className="flex items-center justify-between pb-6">
                        <p className="mb-0 mr-2">Don't have an account?</p>
                        <TERipple rippleColor="light">
                          <button
                            type="submit"
                            className="inline-block rounded border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-neutral-600 hover:bg-danger-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-neutral-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-neutral-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                            onClick={() => navigate('/signup')}
                          >
                            Register
                          </button>
                        </TERipple>
                        {isLoading && (
                            <div
                            className="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] text-success motion-reduce:animate-[spin_1.5s_linear_infinite]"
                            role="status"
                            >
                            <span
                                className="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
                            >
                                Loading...
                            </span>
                            </div>
                        )}
                      </div>
                    </form>
                  </div>
                </div>


                <div
                    className="relative flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none"
                    style={{
                        background: "url('agricBackground.jpg') no-repeat center center fixed",
                        backgroundSize: "cover"
                    }}
                    >
                    <div
                        className="absolute inset-0 bg-black opacity-50" // Overlay style
                    ></div>
                    <div className="relative px-4 py-6 text-white md:mx-6 md:p-12">
                        <h4 className="mb-6 text-xl font-semibold" style={{ textShadow: "1px 1px 2px rgba(0, 0, 0, 0.7)" }}>
                        TRAIS Agro-dealer Portal
                        </h4>
                        <p className="text-sm" style={{ textShadow: "1px 1px 2px rgba(0, 0, 0, 0.7)" }}>
                        Welcome to the Agro Dealer Login Portal. Access comprehensive farmer profiles, view eligible subsidies, and manage allocations efficiently. Simplify your operations and support your clients with real-time information.
                        </p>
                    </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
// Import the SignInWithEsignetButton component
import SignInWithEsignetButton from '/public/esignateSignin.js'; 

// Function to render the sign-in button
export const renderSignInButton = () => {
    // Configuration object 
    const oidcConfig = {
      // GET VALUES FROM THE ENVIRONMENT VARIABLE FOR SECURITY
      acr_values: import.meta.env.VITE_ACR_VALUE,
      authorizeUri: import.meta.env.VITE_AUTHORIZATION_URI,
      claims_locales: 'en',
      // Client ID for the TRAIS application
      client_id: import.meta.env.VITE_CLIENT_ID,
      display: 'page',
      max_age: import.meta.env.VITE_MAX_AGE,
      nonce: import.meta.env.VITE_NONCE,
      prompt: import.meta.env.VITE_PROMPT,
      // URI to redirect after authorization
      redirect_uri: import.meta.env.VITE_REDIRECT_URI,
      scope: import.meta.env.VITE_SCOPE,
      state: 'eree2311',
      ui_locales: 'en',
      claims: {},
    };

    // Initialize the SignInWithEsignetButton if it is available
    SignInWithEsignetButton?.init({
      // Pass the OIDC configuration to the button
      oidcConfig: oidcConfig,
      // Configuration for the appearance and style of the button
      buttonConfig: {
        customStyle: {
          // Style for the label of the button
          labelSpanStyle: {
            display: 'inline-block',
            'font-size': '0.875rem',
            'font-weight': '600',
            'line-height': '1.25rem',
            'vertical-align': 'middle'
          },
          // Style for the logo container
          logoDivStyle: {
            alignItems: 'center',
            background: 'white',
            border: '1px solid #0E3572',
            'border-radius': '18px',
            display: 'inline-block',
            height: '30px',
            position: 'absolute',
            right: '8px',
            verticalAlign: 'middle',
            width: '30px'
          },
          // Style for the logo image
          logoImgStyle: {
            height: '29px',
            'object-fit': 'contain',
            width: '29px'
          },
          // Style for the outer container of the button
          outerDivStyleStandard: {
            'align-items': 'center',
            background: '#0E3572',
            border: '1px solid #0E3572',
            'border-radius': '0.375rem',
            color: 'white',
            display: 'flex',
            padding: '0.625rem 1.25rem',
            position: 'relative',
            'text-decoration': 'none',
            width: '100%'
          }
        },
        // Text to be displayed on the button
        labelText: 'Sign in with e-Signet..........'
      },
      // Target element where the button will be rendered
      signInElement: document.getElementById("sign-in-with-esignet"),
    });
}

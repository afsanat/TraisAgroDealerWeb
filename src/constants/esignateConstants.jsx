import SignInWithEsignetButton from '/public/esignateSignin.js';

export const renderSignInButton = () => {
    const oidcConfig = {
      acr_values: 'mosip:idp:acr:generated-code mosip:idp:acr:biometrics mosip:idp:acr:static-code',
      authorizeUri: 'https://esignet.collab.mosip.net/authorize',
      claims_locales: 'en',
      client_id: 'XxVxF7abwiCBJFK3wEqcjorFgzo68sWMU22ndmQhpgo',
      display: 'page',
      max_age: 21,
      nonce: 'ere973eieljznge2311',
      prompt: 'consent',
      redirect_uri: 'https://trais-agro-dealer-web.vercel.app/UserDetails',
      scope: 'openid profile',
      state: 'eree2311',
      ui_locales: 'en',
      claims: {},
    };

    SignInWithEsignetButton?.init({
      oidcConfig: oidcConfig,
      buttonConfig: {
        customStyle: {
          labelSpanStyle: {
            display: 'inline-block',
            'font-size': '0.875rem',
            'font-weight': '600',
            'line-height': '1.25rem',
            'vertical-align': 'middle'
          },
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
          logoImgStyle: {
            height: '29px',
            'object-fit': 'contain',
            width: '29px'
          },
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
        labelText: 'Sign in with e-Signet..........'
      },
      signInElement: document.getElementById("sign-in-with-esignet"),
    });
  }
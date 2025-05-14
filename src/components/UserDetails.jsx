import { Check } from 'lucide-react';

export default function ConfirmationPage() {
  const handleClose = () => {
    // Close current tab and return to previous tab
    window.close();
  };
  
  return (
    <div className="flex flex-col items-center justify-center min-h-screen bg-gray-50 p-4">
      <div className="bg-white shadow-lg rounded-lg p-8 max-w-md w-full text-center">
        <div className="flex justify-center mb-6">
          <div className="rounded-full bg-green-100 p-3">
            <Check size={48} className="text-green-600" />
          </div>
        </div>
        
        <h1 className="text-2xl font-bold text-gray-800 mb-2">Verification Successful!</h1>
        
        <p className="text-gray-600 mb-6">
          Your identity has been successfully verified. You can now close this window and continue.
        </p>
        
        <button
          onClick={handleClose}
          className="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-4 rounded-md transition-colors"
        >
          Close Window
        </button>
      </div>
    </div>
  );
}
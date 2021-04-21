import React from "react";
import { ToastProvider } from "react-toast-notifications";

import GlobalProvider from "./contexts/GlobalContext";
import GlobalStyle from "./styles/global";
import Routes from "./routes/index";

function App() {
  return (
    <GlobalProvider>
      <ToastProvider autoDismissTimeout="4000" autoDismiss>
        <GlobalStyle />
        <Routes />
      </ToastProvider>
    </GlobalProvider>
  );
}

export default App;

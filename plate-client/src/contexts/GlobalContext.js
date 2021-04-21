import React, { useState, createContext, useEffect } from 'react';

export const GlobalContext = createContext();

export default function GlobalProvider({ children }) {
  const [globalState, setGlobalState] = useState({
    plate: 'BR000BR',
  });

  return (
    <GlobalContext.Provider value={{ globalState, setGlobalState }}>
      {children}
    </GlobalContext.Provider>
  );
}

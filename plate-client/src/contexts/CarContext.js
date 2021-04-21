import React, { useState, createContext } from 'react';

export const CarContext = createContext();

export default function CarProvider({ children }) {
  const [carState, setCarState] = useState({
    isLoading: true,
    error: false,
    content: {},
  });

  /*const [fipeState, setFipeState] = useState({
    isLoading: true,
    error: false,
    content: {},
  });

  const [shopState, setShopState] = useState({
    isLoading: true,
    error: false,
    content: [],
  });*/

  return (
    <CarContext.Provider
      value={{
        carState,
        setCarState,
        /*fipeState,
        setFipeState,
        shopState,
        setShopState,*/
      }}
    >
      {children}
    </CarContext.Provider>
  );
}

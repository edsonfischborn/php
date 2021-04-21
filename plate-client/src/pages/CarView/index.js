import React, { useContext, useEffect } from "react";

import CarProvider from "../../contexts/CarContext";
import { Footer, Header } from "../../components";
import { Main } from "./components";

export default function CarView() {
  return (
    <CarProvider>
      <Header />
      <Main />
      <Footer />
    </CarProvider>
  );
}

import React, { useContext } from "react";

import { GlobalContext } from "../../contexts/GlobalContext";
import { Plate, Footer, Header } from "../../components";
import { Main, Form } from "./styles";
import { FaSearch } from "react-icons/fa";

import PlateValidator from "../../util/PlateValidator";

export default function Home({ history }) {
  const { globalState, setGlobalState } = useContext(GlobalContext);

  const setPlateValue = (e) => {
    const value = e.target.value;

    if (PlateValidator.inputValidator(value)) {
      setGlobalState({
        ...globalState,
        plate: value,
      });
    }
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    history.push(`/view/${globalState.plate.toLowerCase()}`);
  };

  return (
    <>
      <Header />
      <Main>
        <Plate plateValue={globalState.plate} />
        <Form onSubmit={(e) => handleSubmit(e)}>
          <input
            type="text"
            placeholder="Digite a placa"
            value={globalState.plate}
            onChange={(e) => setPlateValue(e)}
          />
          <button type="submit">
            <FaSearch />
     
          </button>
        </Form>
      </Main>
      <Footer />
    </>
  );
}

import React, { useContext, useEffect } from "react";
import { Redirect, Route } from "react-router";
import { useToasts } from "react-toast-notifications";

import { GlobalContext } from "../contexts/GlobalContext";

import PlateValidator from "../util/PlateValidator";

export default function ValidPlateRoute({ plate, ...props }) {
  const { globalState, setGlobalState } = useContext(GlobalContext);
  const { addToast } = useToasts();

  const plateValue = plate();
  const plateValidator = PlateValidator.isValidPlate(plateValue);

  useEffect(() => {
    if (!plateValidator.error) {
      setGlobalState({
        ...globalState,
        plate: plateValue,
      });
    } else {
      addToast(plateValidator.message, { appearance: "error" });
    }
  }, []);

  if (plateValidator.error) {
    return <Redirect to="/" />;
  }

  return <Route {...props} />;
}

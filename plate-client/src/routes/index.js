import React from "react";
import { Route, BrowserRouter, Switch } from "react-router-dom";

import ValidPlateRoute from "./ValidPlateRoute";

import { CarView, Home } from "../pages";

export default function Routes() {
  return (
    <BrowserRouter>
      <Switch>
        <ValidPlateRoute
          path="/view/:plate"
          component={CarView}
          plate={() => window.location.pathname.split("/")[2]}
        />
        <Route path="*" component={Home} />
      </Switch>
    </BrowserRouter>
  );
}

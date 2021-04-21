import React from "react";

import { Container, Hline, Title } from "./styles";

import { FaTruckPickup } from "react-icons/fa";

export default function Header() {
  return (
    <Container>
      <section>
        <Hline />
        <Title>
          <h1>BUS-CAR</h1>
          <FaTruckPickup />
        </Title>
        <Hline />
      </section>
    </Container>
  );
}

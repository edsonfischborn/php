import React from "react";
import { Container, Header, Content } from "./styles";

import logoMercosul from "../../assets/images/logo-mercosul2.png";
import logoBrasil from "../../assets/images/logo-brasil.png";
import qrCode from "../../assets/images/qrcode.png";

export default function Plate({ plateValue }) {
  return (
    <Container>
      <Header>
        <img src={logoMercosul} alt="Mercosul" height="55" />
        <h3>Brasil</h3>
        <img src={logoBrasil} alt="Brasil" height="35" />
      </Header>
      <Content>
        <img src={qrCode} alt="qrcode" height="30" />
        <strong>{plateValue}</strong>
      </Content>
    </Container>
  );
}

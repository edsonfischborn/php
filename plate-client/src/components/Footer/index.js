import React from "react";
import { Container } from "./styles";

import { FaGithub } from "react-icons/fa";

export default function Footer() {
  return (
    <Container>
      <FaGithub />
      <a href="https://github.com/edsonfischborn" target="__blank">
        Édson Fischborn
      </a>
    </Container>
  );
}

import React, { useState } from "react";
import { FaChevronUp } from "react-icons/fa";
import { Container, TitleCt, Content } from "./styles";

export default function Collapsible({
  Icon,
  Title,
  children,
  arrowColor,
  toggle = true,
}) {
  const [state, setState] = useState({
    toggle,
  });

  return (
    <Container>
      <TitleCt
        toggle={state.toggle}
        onClick={() => setState({ toggle: state.toggle ? false : true })}
      >
        {Icon}
        {Title}
        <div />
        <FaChevronUp color={arrowColor} />
      </TitleCt>
      <Content toggle={state.toggle}>{children}</Content>
    </Container>
  );
}

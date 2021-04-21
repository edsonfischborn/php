import styled from "styled-components";

export const Container = styled.footer`
  width: 100%inherit;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  letter-spacing: 1.5px;

  svg {
    color: #fff;
    margin-right: 5px;
    font-size: 25px;
  }

  a {
    text-decoration: none;
    color: #fff;
  }

  a:hover {
    text-decoration: underline;
  }
`;

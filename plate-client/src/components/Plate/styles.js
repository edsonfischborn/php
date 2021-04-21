import styled from "styled-components";

export const Container = styled.section`
  width: 550px;
  height: 220px;

  @media (max-width: 900px) {
    display: none;
  }
`;

export const Header = styled.div`
  height: 65px;
  background-color: #0135a5;
  border-top-left-radius: 16px;
  border-top-right-radius: 16px;
  padding: 0 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;

  h3 {
    text-transform: uppercase;
    color: #fff;
    font-size: 35px;
    font-weight: 600;
    letter-spacing: 4px;
  }

  h3 + img {
    border-radius: 3px;
  }
`;

export const Content = styled.div`
  background-color: #efefef;
  border-bottom-left-radius: 16px;
  border-bottom-right-radius: 16px;
  height: calc(100% - 65px);
  padding: 15px;
  display: flex;
  align-items: center;
  overflow: hidden;

  img {
    align-self: flex-start;
  }

  strong {
    margin-left: 15px;
    font-size: 165px;
    font-weight: 400;
    font-family: "Glneng";
    color: #000;
  }
`;

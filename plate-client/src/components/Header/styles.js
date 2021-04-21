import styled from "styled-components";

export const Container = styled.header`
  display: flex;
  align-items: flex-end;
  justify-content: center;
  height: 100px;
  color: #fff;

  section {
    display: flex;
    align-items: flex-end;
    justify-content: center;

    svg {
      font-size: 40px;
      margin-top: -8px;
      transform: rotate(45deg);
    }

    div:first-child {
      align-self: flex-start;
      margin-right: -50px;
    }

    div:last-child {
      margin-left: -70px;
    }
  }
`;

export const Title = styled.div`
  display: flex;
  align-items: center;
  margin: 5px 0px;
`;

export const Hline = styled.div`
  height: 2px;
  width: 80px;
  background-color: #fff;
`;

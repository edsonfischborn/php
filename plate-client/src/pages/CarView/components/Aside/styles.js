import styled from 'styled-components';

export const Container = styled.aside`
  width: 35%;
  height: 100%;
  position: relative;

  div {
    overflow: hidden;
    height: 100%;
    width: 100%;
  }

  div > div {
    transform: skew(-15deg);
    margin-left: -30%;
    background-color: #e9e9f9;
  }

  h3 {
    position: absolute;
    left: 20px;
    top: 20px;
  }

  a {
    text-decoration: none;
    position: absolute;
    left: 20px;
    bottom: 20px;
    font-size: 18px;
    background: none;
    border: none;
    display: flex;
    align-items: center;
    cursor: pointer;

    svg {
      color: #0135a5;
      margin-right: 5px;
    }
  }

  a:hover {
    text-decoration: underline;
  }

  img {
    position: absolute;
    height: 37%;
    left: -25%;
    top: calc(450px / 2 - 13%);
  }

  @media (max-width: 900px) {
    & {
      display: none;
    }
  }
`;

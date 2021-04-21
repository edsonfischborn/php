import styled from "styled-components";

export const Main = styled.main`
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  height: 70vh;
`;

export const Form = styled.form`
  display: flex;
  align-items: center;
  justify-content: center;
  width: 550px;
  height: 75px;
  margin-top: 20px;

  input,
  button {
    outline: none;
    font-size: 18px;
    letter-spacing: 2px;
  }

  input {
    height: 45px;
    width: 300px;
    border: 1px solid #0135a5;
    padding: 0 15px;
    text-align: center;
    text-transform: uppercase;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
  }

  button {
    height: 45px;
    width: 60px;
    cursor: pointer;
    background-color: #0135a5;
    border: none;
    margin-left: -5px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.5s ease;

    svg {
      transform: rotate(100deg);
      font-size: 20px;
    }
  }

  button:hover {
    background-color: #052668;
  }

  @media (max-width: 900px) {
    & {
      width: 100%;
    }

    input {
      width: 80%;
    }
  }
`;

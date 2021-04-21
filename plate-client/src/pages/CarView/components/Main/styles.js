import styled from 'styled-components';

export const Container = styled.main`
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  min-height: 70vh;
  padding: 30px 0;
`;

export const SectionDetail = styled.section`
  width: 70%;
  height: 510px;
  border-radius: 10px;
  display: flex;
  background-color: #fff;

  @media (max-width: 900px) {
    & {
      width: 90%;
      min-height: 600px;
    }
  }
`;

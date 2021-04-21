import styled from 'styled-components';

export const Container = styled.div`
  padding: 20px 30px 20px 0px;
  width: 65%;
  overflow: hidden;

  > h3 {
    margin-bottom: 20px;
  }

  > div + div {
    margin-top: 30px;
  }

  @media (max-width: 900px) {
    & {
      width: 100%;
      padding: 10px;
    }
  }
`;

export const DataGrid = styled.ul`
  overflow: hidden;
  list-style: none;
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-row-gap: 10px;
  grid-column-gap: 30px;
  padding: 10px 0 10px 37px;

  strong {
    margin-right: 2px;
  }

  @media (max-width: 900px) {
    & {
      grid-template-columns: 1fr;
    }
  }
`;

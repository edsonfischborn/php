import styled from 'styled-components';

export const Container = styled.div`
  width: 100%;
`;

export const TitleCt = styled.div`
  display: flex;
  align-items: center;
  width: 100%;
  cursor: pointer;

  svg:first-child {
    margin-right: 10px;
  }

  svg:last-child {
    transform: rotate(${(props) => (props.toggle ? '0deg' : '180deg')});
    transition: transform 0.2s linear;
  }

  div {
    flex-grow: 1;
    background-color: gray;
    height: 1px;
    margin: 0 10px;
  }
`;

export const Content = styled.div`
  overflow: hidden;
  max-height: ${(props) => (props.toggle ? '0' : '350px')};
  transition: max-height 0.2s ease-out;
`;

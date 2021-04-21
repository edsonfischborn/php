import React, { useContext, useEffect, useState } from 'react';

import { GlobalContext } from '../../../../contexts/GlobalContext';
import { CarContext } from '../../../../contexts/CarContext';
import { Aside, Content } from '../index';
import { Container, SectionDetail } from './styles';

import CarApi from '../../../../util/CarApi';

export default function Main() {
  const { globalState } = useContext(GlobalContext);
  const { setCarState } = useContext(CarContext);

  useEffect(() => {
    async function setData() {
      const { error, content } = await CarApi.find(globalState.plate);

      setCarState({
        isLoading: false,
        error,
        content,
      });
    }

    setData();
  }, []);

  return (
    <Container>
      <SectionDetail>
        <Aside />
        <Content />
      </SectionDetail>
    </Container>
  );
}

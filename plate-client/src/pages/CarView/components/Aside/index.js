import React, { useContext } from 'react';
import { FaArrowLeft } from 'react-icons/fa';
import { Link } from 'react-router-dom';

import { Container } from './styles';
import { CarContext } from '../../../../contexts/CarContext';

import logo from '../../../../assets/images/undraw-city-driver-2.png';

export default function Aside() {
  const { carState } = useContext(CarContext);
  const carName =
    carState.isLoading || carState.error
      ? ''
      : carState.content.brand.split(' ')[0];

  return (
    <Container>
      <div>
        <div />
      </div>
      <h3>{carName}</h3>
      <Link to="/">
        <FaArrowLeft /> Início
      </Link>
      <img src={logo} alt="car-logo" />
    </Container>
  );
}

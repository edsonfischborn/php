import React, { useContext } from 'react';

import { CarContext } from '../../../../contexts/CarContext';
import { Container, DataGrid } from './styles';
import { Loader, Collapsible } from '../../../../components';
import { FaCog } from 'react-icons/fa';

export default function Content() {
  const { carState } = useContext(CarContext);

  return (
    <Container>
      <Collapsible
        Icon={<FaCog color="#0135A5" size="25" />}
        Title={<h3>Caracteristicas</h3>}
        arrowColor="#0135A5"
        toggle={false}
      >
        {carState.isLoading ? (
          <Loader />
        ) : (
          <DataGrid>
            {carState.error ? (
              <span>Erro ao carregar os dados do veiculo</span>
            ) : (
              <>
                <li>
                  <strong>Placa:</strong>
                  <span>{carState.content.plate}</span>
                </li>
                <li>
                  <strong>Ano:</strong>
                  <span>{carState.content.year}</span>
                </li>
                <li>
                  <strong>Ano do modelo:</strong>
                  <span>{carState.content.modelYear}</span>
                </li>
                <li>
                  <strong>Chassi:</strong>
                  <span>{carState.content.chassi}</span>
                </li>
                <li>
                  <strong>Marca/modelo:</strong>
                  <span>{carState.content.brand}</span>
                </li>
                <li>
                  <strong>Municipio:</strong>
                  <span>{carState.content.city}</span>
                </li>
                <li>
                  <strong>UF:</strong>
                  <span>{carState.content.state}</span>
                </li>
                <li>
                  <strong>Situação:</strong>
                  <span>{carState.content.situation}</span>
                </li>
              </>
            )}
          </DataGrid>
        )}
      </Collapsible>
    </Container>
  );
}

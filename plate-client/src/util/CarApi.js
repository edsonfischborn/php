class FindError extends Error {
  constructor(msg) {
    super(msg);
  }
}

export default class CarApi {
  static async find(plate) {
    try {
      const res = await fetch(`apiurl`);

      if (res.status === 200) {
        const data = await res.json();

        return {
          error: false,
          message: null,
          content: {
            plate: data.placa,
            year: data.ano,
            modelYear: data.anoModelo,
            chassi: data.chassi,
            brand: data.marca,
            city: data.municipio,
            state: data.uf,
            situation: data.situacao,
          },
        };
      }

      throw new FindError();
    } catch (err) {
      return {
        error: true,
        message: null,
        content: null,
      };
    }
  }
}

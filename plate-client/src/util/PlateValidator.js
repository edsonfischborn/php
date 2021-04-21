export default class PlateValidator {
  static isValidPlate(plate) {
    const PLATE_FORMATS = [
      /^[a-zA-Z]{3}[0-9]{4}$/im,
      /^[a-zA-Z]{3}[0-9]{1}[a-zA-Z]{1}[0-9]{2}$/im,
      /^[a-zA-Z]{3}[0-9]{2}[a-zA-Z]{1}[0-9]{1}$/im,
    ];
    const SPECIAL = /[^a-zA-Z0-9]/i;

    const plateToUse = plate.replace(SPECIAL, "");
    const valid = PLATE_FORMATS.reduce(
      (res, format) => res || format.test(plateToUse),
      false
    );

    if (!valid) {
      return {
        error: true,
        message:
          'Formato de placa inválido! Utilize o formato "LLLNLNN", "LLLNNLN" ou "LLLNNNN" (em que L é letra e N, número).',
      };
    }

    return {
      error: false,
      message: null,
    };
  }

  static inputValidator(value) {
    return value.length <= 7 && (!value || value.match(/^[0-9a-zA-Z]+$/));
  }
}

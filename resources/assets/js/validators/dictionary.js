const dictionary = {
  pt: {
    messages: {
      cpf: () => 'CPF inválido',
      email: () => 'E-mail inválido',
      required: (field) => `O campo ${field} é obrigatório.`,
      min: (field) => `Mínimo 6 caracteres.`
    }
  },
  custom: {
    required: 'Campo obrigatório.'
  }
}
export default dictionary

const dictionary = {
  pt: {
    messages: {
      cpf: () => 'CPF inválido',
      email: () => 'E-mail inválido',
      required: (field) => `O campo ${field} é obrigatório.`
    }
  },
  custom: {
    required: 'Campo obrigatório.'
  }
}
export default dictionary

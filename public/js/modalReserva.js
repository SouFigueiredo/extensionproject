function abrirModal(id, nome) {
    document
        .getElementById('modalReserva')
        .classList
        .remove('hidden');

    document
        .getElementById('sala_id')
        .value = id;

    document
        .getElementById('nome_sala')
        .value = nome;
}

function fecharModal() {
    document
        .getElementById('modalReserva')
        .classList
        .add('hidden');
}
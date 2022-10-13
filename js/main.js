const modalBody = document.getElementById('modal-body');
const contenedor = document.getElementById('contenedor');
const modalTitle = document.getElementById('tittle');

function añadirLibro(id) {

    const card = document.getElementById(id);
    const nombre = document.getElementById(`nombre${id}`);

    modalBody.appendChild(card);
    card.classList.remove('d-none');

    modalTitle.innerHTML = nombre.textContent;

}

function borrarLibro(id) {

    const cardModal = modalBody.firstElementChild

    contenedor.appendChild(cardModal);
    cardModal.classList.add('d-none');

}
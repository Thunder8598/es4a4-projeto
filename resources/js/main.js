import 'bootstrap/dist/js/bootstrap.js';

import Topico from './topico/Topico';

const { classList } = document.body;

if (classList.contains("pagina-topicos"))
    new Topico().enviarComentario();
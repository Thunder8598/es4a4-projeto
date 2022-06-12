import 'bootstrap/dist/js/bootstrap.js';

import Home from './home/Home';
import Topico from './topico/Topico';
import Busca from './busca/Busca';

const { classList } = document.body;

if (classList.contains("pagina-inicial")) {
    const home = new Home();

    home.listarTopicos();
}

else if (classList.contains("pagina-topicos")) {
    const topico = new Topico();

    topico.enviarComentario();
    topico.listarComentarios();
}

else if (classList.contains("pagina-busca")) {
    const busca = new Busca();

    busca.listarTopicos();
}
import 'bootstrap/dist/js/bootstrap.js';

import Home from './home/Home';
import Topico from './topico/Topico';

const { classList } = document.body;

if (classList.contains("pagina-inicial")) {
    const home = new Home();

    home.listarTopicos();
}

else if (classList.contains("pagina-topicos"))
    new Topico().enviarComentario();
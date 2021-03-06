import $ from "jquery";

import Fetch from "../helpers/Fetch";

class Busca {
    constructor() {
        this.next_page_url = `${location.origin}/topicos?busca=${new URL(location.href).searchParams.get("busca")}`;
        this.btnCarregar = $("#btn-carregar-topicos");

        this.onClickBtnCarregarTopicos();
    }

    listarTopicos = async () => {
        const listaTopicos = $("#lista-topicos");

        try {
            const { data, next_page_url } = (await Fetch.get(this.next_page_url)).resposta;

            this.next_page_url = next_page_url;

            data.forEach(({ permalink, titulo }) => {
                listaTopicos.append(`<li class="list-group-item bg-white"><a href="/comente-sobre/${permalink}">${titulo}</a></li>`);
            });

            if (!this.next_page_url)
                this.btnCarregar.hide();
            else
                this.btnCarregar.show();

        } catch (error) {
            console.log(error);

            switch (error.status) {
                case 404:
                    listaTopicos.append(`
                        <li class="list-group-item bg-white">
                            <p style="text-align:center">Nenhum tópico encontrado.</p>
                        </li>
                    `);
                    break;
            }
        }
    }

    onClickBtnCarregarTopicos = () => {
        this.btnCarregar.on("click", async () => {
            this.btnCarregar.attr("disabled", "disabled");
            await this.listarTopicos();
            this.btnCarregar.removeAttr("disabled");
        });
    }
}

export default Busca;
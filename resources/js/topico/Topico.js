import $ from "jquery";

import Fetch from "./../helpers/Fetch";

class Topico {
    constructor() {
        this.next_page_url = `${location.origin}/comentarios?permalink=${decodeURI(location.pathname).replace("/comente-sobre/", "")}`;
        this.btnCarregar = $("#btn-carregar-comentarios");
        this.listaComentarios = $("#listagem-comentarios");

        this.onClickBtnCarregarComentarios();
    }

    enviarComentario = () => {
        const form = $("#form-comentario");

        form.on("submit", async (evt) => {
            evt.preventDefault();

            const data = new FormData(evt.currentTarget);

            data.append("permalink", decodeURI(location.pathname).replace("/comente-sobre/", ""));

            try {
                const { comentario, email } = await Fetch.post(`${location.origin}/comentarios`, data);

                this.listaComentarios.prepend(`
                    <li class="list-group-item bg-white">
                        <small><b>${email}</b></small><br/>
                        <p>${comentario}</p>
                    </li>
                `);
            } catch (error) {
                console.error(error);

                form.find(".alert.alert-danger").show().html("");

                const { errors } = (await error.json());

                for (const err in errors)
                    form.find(".alert.alert-danger").append(`<div>${errors[err]}</div>`)
            }
        });
    }

    listarComentarios = async () => {
        try {
            const { data, next_page_url } = (await Fetch.get(this.next_page_url)).resposta;

            this.next_page_url = next_page_url;

            data.forEach(({ email, comentario }) => {
                this.listaComentarios.append(`
                    <li class="list-group-item bg-white">
                        <small><b>${email}</b></small><br/>
                        <p>${comentario}</p>
                    </li>
                `);
            });

            if (!this.next_page_url)
                this.btnCarregar.hide();
            else
                this.btnCarregar.show();

        } catch (error) {
            console.log(error);

            switch (error.status) {
                case 404:
                    this.listaComentarios.append(`
                        <li class="list-group-item bg-white">
                            <p style="text-align:center">Seja o primeiro a comentar</p>
                        </li>
                    `);
                    break;
            }

            this.btnCarregar.hide();
        }
    }

    onClickBtnCarregarComentarios = () => {
        this.btnCarregar.on("click", async () => {
            this.btnCarregar.attr("disabled", "disabled");
            await this.listarComentarios();
            this.btnCarregar.removeAttr("disabled");
        });
    }
}

export default Topico;
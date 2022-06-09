import $ from "jquery";

class Topico {
    enviarComentario = () => {
        const form = $("#form-comentario");

        form.on("submit", async (evt) => {
            evt.preventDefault();

            const data = new FormData(evt.currentTarget);

            data.append("permalink", decodeURI(location.pathname));

            try {
                await fetch(`${location.origin}/comentarios`, { method: "POST", body: data })
            } catch (error) {
                console.error(error);
            }
        });
    }
}

export default Topico;
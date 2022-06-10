class Fetch {

    static debug = false;

    static getHeaders = () => {

        const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");

        if (!csrf)
            throw "X-CSRF-TOKEN vazio";

        return new Headers({
            "X-CSRF-TOKEN": csrf,
            "X-Requested-With": "XMLHttpRequest"
        });
    }

    static post = async (url, data) => {
        const response = await fetch(url, {
            headers: Fetch.getHeaders(),
            method: "POST",
            body: data
        });

        return Fetch.responseHandle(response);
    }

    static get = async (url) => {
        const response = await fetch(url, { headers: Fetch.getHeaders() });

        return Fetch.responseHandle(response);
    }

    static responseHandle = async (response) => {
        try {

            if (response.status > 299)
                throw response;

            const json = await response.json();

            if (Fetch.debug)
                console.debug(response);

            return (typeof (json) == "string" && json.length ? JSON.parse(json) : json);
        } catch (error) {
            throw response;
        }
    }
}

export default Fetch;
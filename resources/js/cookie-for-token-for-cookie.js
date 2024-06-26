window.addEventListener('DOMContentLoaded', function () {
    const createTokenButton = document.querySelector('button#create-token-button');
    const obtainCookieInNewTabButton = document.querySelector('button#obtain-cookie-in-new-tab-button');

    let token;

    createTokenButton.addEventListener('click', async function (event) {
        event.target.disabled = true;

        const response = await fetch('http://localhost:8000/tokens', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content,
            },
            credentials: 'include',
            body: JSON.stringify({
                'name': 'Tokenplz'
            })
        })

        if (response.ok) {
            const data = await response.json();
            token = data.data.token;

            const form = document.createElement('form');
            form.action = 'http://localhost:8000/cookies?target=asdf';
            form.method = 'post';
            form.target = '_blank';

            const tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = 'api_token';
            tokenInput.value = token;

            form.appendChild(tokenInput);

            document.body.appendChild(form);

            form.submit();
        }
    })


    obtainCookieInNewTabButton.addEventListener('click', function (event) {


    })
})

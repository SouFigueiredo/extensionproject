async function login() {

    const usuario = document.getElementById('inUser').value;
    const senha = document.getElementById('inPass').value;

    const response = await fetch('/api/auth/login.php', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/json'
        },

        body: JSON.stringify({
            usuario,
            senha
        })
    });

    const data = await response.json();

    alert(data.message);
}
body {
    background-color: #121212;
    color: #f1f1f1;
    font-family: Arial, sans-serif;
    padding: 20px;
    margin: 0;
}

.container, .auth-box, .review-box {
    max-width: 600px;
    margin: auto;
    background: #1e1e1e;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 15px #00000066;
}

h2, h3 {
    text-align: center;
    color: #ffcc00;
}

form {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 20px;
}

input, select, button {
    padding: 10px;
    border: none;
    border-radius: 5px;
}

input[type="text"],
input[type="password"],
select {
    background-color: #2a2a2a;
    color: #ffffff;
}

button {
    background-color: #ffcc00;
    color: #000;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background-color: #e6b800;
}

.results ul {
    list-style: none;
    padding-left: 0;
}

.results li {
    margin: 10px 0;
    padding: 10px;
    background-color: #2a2a2a;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.results img {
    border-radius: 4px;
}

.error {
    color: #ff4d4d;
    text-align: center;
    font-weight: bold;
}

a {
    color: #66ccff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.logout-btn {
    margin-top: 30px;
    background-color: #444;
    color: #fff;
}

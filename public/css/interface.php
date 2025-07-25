body {
    background-color: #121212;
    color: #f0f0f0;
    font-family: 'Segoe UI', sans-serif;
    margin: 0;
    padding: 20px;
}

.container, .auth-box, .review-box {
    max-width: 700px;
    margin: 40px auto;
    background-color: #1e1e1e;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 0 20px #00000044;
}

h2, h3 {
    text-align: center;
    color: #ffc107;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

input, select, button {
    padding: 12px;
    border-radius: 6px;
    border: none;
    font-size: 16px;
}

input[type="text"],
input[type="password"],
select {
    background-color: #2c2c2c;
    color: #ffffff;
}

button {
    background-color: #ffc107;
    color: #000000;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s ease;
}

button:hover {
    background-color: #e0a800;
}

a {
    color: #66ccff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.error {
    color: #ff4d4d;
    font-weight: bold;
    text-align: center;
}

.results ul {
    list-style: none;
    padding-left: 0;
}

.results li {
    background-color: #2a2a2a;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.results img {
    width: 60px;
    border-radius: 4px;
}

.movie-details img {
    max-width: 200px;
    border-radius: 10px;
    margin-bottom: 10px;
}

.movie-details p {
    line-height: 1.6;
}

.logout-btn {
    margin-top: 30px;
    background-color: #444;
    color: #fff;
}

.review-box {
    background-color: #1b1b1b;
    margin-top: 30px;
    padding: 20px;
    border-left: 4px solid #ffc107;
}

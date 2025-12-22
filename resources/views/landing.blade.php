<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Laravel App</title>
    <style>
        body {
            background: rgb(250, 250, 250);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Greetings!</h1>
        <p>This is the landing page.</p>
        <a href="/about">Go to About →</a>
        <form method="POST" action="/choose-that-pokemon" >
            @csrf
            <input type="hidden" name="pokemon" value="charizard" />
            <button type="submit">Choose</button>
        </form>
        <form method="POST" action="/choose-that-pokemon" >
            @csrf
            <input type="hidden" name="pokemon" value="squirtle" />
            <button type="submit">Choose</button>
        </form>
        <form method="POST" action="/choose-that-pokemon" >
            @csrf
            <input type="hidden" name="pokemon" value="bulbasaur" />
            <button type="submit">Choose</button>
        </form>
    </div>
</body>
</html>
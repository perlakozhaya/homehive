<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    button {
  background: transparent;
  position: relative;
  padding: 5px 15px;
  display: flex;
  align-items: center;
  font-size: 17px;
  font-weight: 600;
  text-decoration: none;
  cursor: pointer;
  border: 1px solid #EAA534;
  border-radius: 25px;
  outline: none;
  overflow: hidden;
  color: #3A3333;
  transition: color 0.3s 0.1s ease-out;
  text-align: center;
}

button span {
  margin: 10px;
}

button::before {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  content: '';
  border-radius: 50%;
  display: block;
  width: 20em;
  height: 20em;
  left: -5em;
  text-align: center;
  transition: box-shadow 0.5s ease-out;
  z-index: -1;
}

button:hover {
  color: #3A3333;
  border: 1px solid #3A3333;
}

button:hover::before {
  box-shadow: inset 0 0 0 10em #EAA534;
}
</style>
<body>

    <button>
        <span>Sign In</span>
    </button>
    
</body>
</html>
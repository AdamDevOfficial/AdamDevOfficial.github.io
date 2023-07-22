<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Password Generator</title>
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap');

:root {
  --purple: #8e44ad;
  --red: #c0392b;
  --orange: #f39c12;
  --black: #333;
  --white: #fff;
  --light-color: #666;
  --light-white: #ccc;
  --light-bg: #f5f5f5;
  --border: 0.1rem solid var(--black);
  --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
}

*{
   font-family: 'Rubik', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
   transition:all .2s linear;
}

*::selection {
  background-color: var(--purple);
  color: var(--white);
}

*::-webkit-scrollbar {
  height: 0.5rem;
  width: 1rem;
}

*::-webkit-scrollbar-track {
  background-color: transparent;
}

*::-webkit-scrollbar-thumb {
  background-color: var(--purple);
}

body {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: var(--light-bg);
}

.container {
  width: 450px;
  background: var(--white);
  border: 1px solid var(--black);
  border-radius: 8px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
}

.container h3 {
  font-weight: 600;
  font-size: 1.31rem;
  padding: 1rem 1.75rem;
  border-bottom: 1px solid #d4dbe5;
  text-transform: uppercase;
  text-align: center;
}

.wrapper {
  margin: 1.25rem 1.75rem;
}

.wrapper .input-box {
  position: relative;
}

.input-box input {
  width: 100%;
  height: 53px;
  color: var(--black);
  background: none;
  font-size: 1.06rem;
  font-weight: 500;
  border-radius: 4px;
  letter-spacing: 1.4px;
  border: 1px solid #aaa;
  padding: 0 2.85rem 0 1rem;
}

.input-box span {
  position: absolute;
  right: 13px;
  cursor: pointer;
  line-height: 53px;
  color: #707070;
}

.input-box span:hover {
  color: var(--purple) !important;
}

.wrapper .pass-indicator {
  width: 100%;
  height: 4px;
  position: relative;
  margin-top: 0.75rem;
  border-radius: 25px;
}

.pass-indicator::before {
  position: absolute;
  content: "";
  height: 100%;
  width: 50%;
  border-radius: inherit;
  transition: width 0.3s ease;
}

.pass-indicator#weak::before {
  width: 20%;
  background: #e64a4a;
}

.pass-indicator#medium::before {
  width: 50%;
  background: #f1c80b;
}

.pass-indicator#strong::before {
  width: 100%;
  background: var(--purple);
}

.wrapper .pass-length {
  margin: 1.56rem 0 1.25rem;
}

.pass-length .details {
  display: flex;
  justify-content: space-between;
}

.pass-length input {
  width: 100%;
  height: 5px;
}

.pass-settings .options {
  display: flex;
  list-style: none;
  flex-wrap: wrap;
  margin-top: 1rem;
}

.pass-settings .options .option {
  display: flex;
  align-items: center;
  margin-bottom: 1rem;
  width: calc(100% / 2);
}

.options .option:first-child {
  pointer-events: none;
}

.options .option:first-child input {
  opacity: 0.7;
}

.options .option input {
  height: 16px;
  width: 16px;
  cursor: pointer;
}

.options .option label {
  cursor: pointer;
  color: #4f4f4f;
  padding-left: 0.63rem;
}

.wrapper .generate-btn {
  width: 100%;
  color: var(--white);
  border: none;
  outline: none;
  cursor: pointer;
  background: var(--purple);
  font-size: 1.06rem;
  padding: 0.94rem 0;
  border-radius: 5px;
  margin: 0.94rem 0 1.3rem;
}
.container  p {
    
    text-align: center;
    color: var(--black);
}
.container  p a {
    color: var(--purple);
}

</style>

<body>

    <div class="container">
        <h3>Password Generator</h3>
        <div class="wrapper">
            <div class="input-box">
                <input type="text" disabled>
                <span class="material-symbols-rounded">copy_all</span>
            </div>
            <div class="pass-indicator"></div>
            <div class="pass-length">
                <div class="details">
                    <label class="title">Password Length</label>
                    <span></span>
                </div>
                <input type="range" min="1" max="30" value="15" step="1">
            </div>

            <div class="pass-settings">
                <label class="title">Password Settings</label>
                <ul class="options">
                    <li class="option">
                        <input type="checkbox" id="lowercase" checked>
                        <label for="lowercase">Lowercase (a-z)</label>
                    </li>
                    <li class="option">
                        <input type="checkbox" id="uppercase">
                        <label for="uppercase">Uppercase (A-Z)</label>
                    </li>
                    <li class="option">
                        <input type="checkbox" id="numbers">
                        <label for="numbers">Numbers (0-9)</label>
                    </li>
                    <li class="option">
                        <input type="checkbox" id="symbols">
                        <label for="symbols">Symbols (!-$^+)</label>
                    </li>
                    <li class="option">
                        <input type="checkbox" id="exc-duplicate">
                        <label for="exc-duplicate">Exclude Duplicate</label>
                    </li>
                    <li class="option">
                        <input type="checkbox" id="spaces">
                        <label for="spaces">Include Spaces</label>
                    </li>
                </ul>
            </div>

            <button class="generate-btn">Generate Password</button>
            <p>Get Back? <a href="index.php">Back</a></p>

        </div>
    </div>

    <script src="js/pass_gene.js"></script>
</body>

</html>

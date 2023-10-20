### Tests, linter & maintainability status:
<hr>

[![Actions Status](https://github.com/paultasov/php-project-45/workflows/hexlet-check/badge.svg)](https://github.com/paultasov/php-project-45/actions)
[![Maintainability](https://api.codeclimate.com/v1/badges/e091dafe0b00a5db8718/maintainability)](https://codeclimate.com/github/paultasov/php-project-45/maintainability)

## Description
"Brain Games" — a set of five console games, built on the principle of popular mobile applications 
for brain pumping. Each game asks questions to which you have to give correct answers. 
After three correct answers, the game is considered to be completed. Incorrect answers end 
the game and prompt you to go through it again. Games:

- Calculator. Arithmetic expressions to be calculated.
- Progression. Finding missing numbers in a sequence of numbers.
- Determining an even number.
- Determining the greatest common divisor.
- Determining a prime number.

## System Requirements
- [PHP](https://www.php.net/downloads) version: 8.2
- [Composer](https://getcomposer.org/download/) version: 2.6.3
- [PHP Command Line Tools](https://github.com/wp-cli/php-cli-tools) version: 0.11.19

## How to install & run?
1. Clone this repository.
2. Go to the project folder.
3. Open your REPL.
4. Run `make install` to install Composer dependencies.
5. To start any game use this command in REPL `make brain-<game name>`. For example: to start Calc Game use `make brain-calc` etc.

_P.S. other commands for launching games are described in `Makefile`_

## Game overviews
#### 1. <span style="color: #21a19a">Brain-Even Game</span> — `brain-even`
##### _The game rule: Answer "yes" if the number is even, otherwise answer "no"._
***
[![asciicast](https://asciinema.org/a/gHmfJSIccYQORygaa4ONcIdq0.svg)](https://asciinema.org/a/gHmfJSIccYQORygaa4ONcIdq0)

#### 2. <span style="color: #21a19a">Brain-Calc Game</span> — `brain-calc`
##### _The game rule: What is the result of the expression?_
***
[![asciicast](https://asciinema.org/a/1jk3iUx6ETfTy8hB9rxuXqGtC.svg)](https://asciinema.org/a/1jk3iUx6ETfTy8hB9rxuXqGtC)

#### 3. <span style="color: #21a19a">Brain-Gcd Game</span> — `brain-gcd`
##### _The game rule: Find the greatest common divisor of given numbers._
***
[![asciicast](https://asciinema.org/a/HOOjUCiImcjhCdL4UQYcSM8vQ.svg)](https://asciinema.org/a/HOOjUCiImcjhCdL4UQYcSM8vQ)

#### 4. <span style="color: #21a19a">Brain-Progression Game</span> — `brain-progression`
##### _The game rule: What number is missing in the progression?_
***
[![asciicast](https://asciinema.org/a/1ZDOAkhZgCF3uQ0eZKBqfLTGN.svg)](https://asciinema.org/a/1ZDOAkhZgCF3uQ0eZKBqfLTGN)

#### 5. <span style="color: #21a19a">Brain-Prime Game</span> — `brain-prime`
##### _Answer "yes" if given number is prime. Otherwise answer "no"._
***
[![asciicast](https://asciinema.org/a/RPYHiyXLwMGF22cfSOEjuctQT.svg)](https://asciinema.org/a/RPYHiyXLwMGF22cfSOEjuctQT)
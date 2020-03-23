import { Book } from './Book.js';
 
let firstBook = new Book(
    "L'Homme à l'envers",
    "Fred Vargas",
    254,
    "L'Homme à l'envers est un roman policier de Fred Vargas paru en mars 1999.",
    number,
    this.read);
 
let secondBook = new Book(
    "Double Assassinat dans la rue morgue",
    "Edgar Allan Poe",
    26,
    "Double assassinat dans la rue Morgue est une nouvelle de l’écrivain américain Edgar Allan Poe, parue en avril 1841.",
    number,
    this.read);
 
let thirdBook = new Book(
    "Millenium 1 : Les hommes qui n'aimaient pas les femmes",
    "Stieg Larsson",
    526,
    "Les Hommes qui n'aimaient pas les femmes est le premier tome de la trilogie Millénium, écrite par le Suédois Stieg Larsson et paru en 2005.",
    number,
    this.read);
 
let bookList = [];
bookList.push(firstBook, secondBook, thirdBook);
 
export { bookList };
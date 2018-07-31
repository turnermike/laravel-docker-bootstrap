
// import the Cat module
let cats = require('./exports-example-class.js');
let Cat = cats.Cat;

// create some cats
let cat1 = new Cat("Bruce Lee", 4);
let cat2 = new Cat("Chuck Norris", 6);

// Let's find out the names and ages of cats in the class
console.log("There are two cats in the class, " + cat1.name + " and " + cat2.name + ".");
console.log("Manny is " + cat1.age + " years old " +  " and Lizzie is " + cat2.age + " years old.");
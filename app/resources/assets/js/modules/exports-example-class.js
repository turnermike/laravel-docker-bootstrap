

// constructor function for the Cat class
function Cat(name, age) {
    this.name = name;
    this.age = age;
}

// class method
Cat.prototype.exampleMethod = function(param) {
    console.log('Param passed to exampleMethod: ', param);
}

module.exports = {
    Cat: Cat
}
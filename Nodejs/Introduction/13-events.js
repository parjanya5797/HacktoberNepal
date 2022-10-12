const EventEmitter = require('events');

const customEmitter = new EventEmitter()

customEmitter.on('response',(name,age)=>{
    console.log(`data recieved with ${name} and age is ${age}`)
})

customEmitter.on('response',()=>{
    console.log(`Some other logic here`)  
})

customEmitter.emit('response','john',34) 
const {createReadStream} = require('fs');

const stream = createReadStream('./content/big.txt',{highWaterMark:90000,encoding:'utf8'});

//default 64kb per chunk
//last buffer is remiander
// highWaterMark - control size
//const stream = createReadStream('./content',{highWaterMark:90000})
// const stream = createReadStream('./content',{encoding:'utf8'})

stream.on('data',(result)=>{
    console.log(result)
})

stream.on('error',(err) => {
    console.log(err);
}) 



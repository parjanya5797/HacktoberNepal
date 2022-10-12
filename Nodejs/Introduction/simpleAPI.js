const express=require("express")
const bodyParser=require("body-parser")
const app=express()
app.use(bodyParser.urlencoded({extended:true}))

app.get("/",function(req,res){
    res.send("This is Home Page")
})

app.get("/contact",function(){
    res.send("Contact on github repo")
})

app.post("/:name",function(req,res){
    let name=req.params;
    res.send(`Your name -${name} has been sent`);
})

app.listen(3000,function(){
    console.log("Server is Listening on Port 3000")
})
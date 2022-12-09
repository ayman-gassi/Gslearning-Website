let box = document.querySelectorAll('.box');
let close = document.querySelector('.close');
let show = document.querySelector('.pop');
let container = document.querySelector('.mam');
let wesh = document.querySelector('.wesh');
box.forEach(element => {
    console.log("clicked");
    element.addEventListener('click',function(){
        show.style.display='block';
        let A = element.childNodes[1].childNodes[0].src;
        let V = element.childNodes[3].childNodes[1].innerText;
        info(A,V);
    });
   
});
close.addEventListener('click',function(){
    show.style.display='none';

});
function info(image,title){
    let i=1;
    container.innerHTML= "<div class=\"iff\"> <div class=\"logoname\"> <img src="+image +"> <p>"+title+"</p> </div>  <div class=\"plantitles\" >  <h4>- What we are going to see -</h4>    </div> <div> ";
        let req = new XMLHttpRequest();
        req.open('GET','../js/courses.json',true);
        console.log("run");
        req.onreadystatechange = function (){
            if(req.readyState==4 && req.status==200){
                    let A = JSON.parse(req.response);
                    console.log(A);
                    A.forEach(elm =>{
                            if(elm.name==title){
                                elm.link.forEach(m=>{
                                    container.innerHTML+="<a href=\"#"+m+"\"><div class=\"surf\">  <h4>"+(i++)+"</h4 <p> "+m+" </p></div></a>";
                                    wesh.innerHTML+="<div class=\"cv\" id=\""+m+"\">   <p> "+m+" </p> <video  class=\"video\" controls> <source src=\"#\" >  </video>   </div>";
                                });
                               
                            }
                          
                    });
            }
        } 
       
        req.send();
       
}
let search = document.querySelector('.search');
search.addEventListener('keyup',function(){
        console.log(search.value);
        if(search.value!=""){
            box.forEach(element =>{
                element.style.display='none';
                });

                let req1 = new XMLHttpRequest();
                req1.open('GET','../js/courses.json',true);
                console.log("run");
                req1.onreadystatechange = function (){
                    if(req1.readyState==4 && req1.status==200){
                            let A = JSON.parse(req1.response);
                            A.forEach(elm =>{   
                                if(elm.name.includes(search.value.toUpperCase())){
                                        console.log(elm);
                                        box.forEach(element => {
                                                let V = element.childNodes[3].childNodes[1].innerText;
                                                if(V.includes(search.value.toUpperCase())){
                                                    element.style.display='flex';
                                                }
                                        });
                                }
                            });
                        
                        
                        }}
                req1.send();
          
        }
        if(search.value==""){
            box.forEach(element =>{
                element.style.display='flex';
                });
        }

});
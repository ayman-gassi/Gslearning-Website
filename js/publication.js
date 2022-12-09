let show = document.querySelector('.show');
let but = document.querySelector('.sub');

var req = new XMLHttpRequest();
req.open('GET','../php/pub.json',true);
req.onreadystatechange =function(){
    if(req.readyState==4 && req.status==200){
        let A1 = JSON.parse(req.response);
        let A = A1.reverse();
        A.forEach(element => {
            show.innerHTML+="<div class=\"new\">  <div class=\"lign1\"> <img src=\"../images/user.png\"> <h4>"+element.user+"</h4>  <label>"+element.date+"</label>  </div>  <h5>-"+element.title+"-</h5>  <p> "+element.msg +" </p>   </div>";
        });
        
        }
}
req.send();

const menu = document.querySelector('#menu-btn');
const navbar = document.querySelector('.header .flex .navbar');
const search=document.querySelector("#search-icon");
const searchForm=document.querySelector("#search-form")
const searchClose=document.querySelector("#close");
const shoppingCart=document.querySelector(".fa-shopping-cart");
const shoppingCartContainer=document.querySelector(".shopping-cart-container");
const heart = document.querySelector(".heart");
const linkHeart = document.querySelectorAll("#content .dishes .box-container .box .box-heart a");
const boxHeart = document.querySelectorAll(".box-heart");
const user=document.querySelector(".fa-user");
const hoverLog=document.querySelector(".hover-login-logout");
[...boxHeart].forEach((item) => item.addEventListener("click", function (e) {
   e.preventDefault();
   console.log(e.target);
   e.target.setAttribute("id", "active-heart")

}))
menu.addEventListener("click", function(){
   navbar.classList.toggle("active");
   menu.classList.toggle('fa-times');

})
document.addEventListener("click", function(event){
       if(!menu.contains(event.target) && !event.target.matches(".navbar")){
         navbar.classList.remove('active');
         menu.classList.remove("fa-times");
         menu.classList.add("fa-bars");
       }


   })
window.onscroll = () =>{
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');
}

search.addEventListener("click", function(){
   searchForm.classList.toggle("active");
   search.classList.toggle('fa-times');
})
searchClose.addEventListener("click", function(){
   searchForm.classList.remove("active");
   search.classList.toggle('fa-times');

})
shoppingCart.addEventListener("click", function(){
   shoppingCartContainer.classList.toggle("active-shopping-cart");
})
user.addEventListener("click", function(e){
    hoverLog.classList.toggle("active-hover");


 })




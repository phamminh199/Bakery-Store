
// const heart = document.querySelector(".heart");
// const linkHeart = document.querySelectorAll("#next-products .dishes .box-container .box .box-heart a");
// const boxHeart = document.querySelectorAll(".box-heart");
const commentCick=document.querySelector(".comment_click");
const feedbackClick=document.querySelector(".feedback_click");
const commentShow=document.querySelector(".comment_show");
const feedbackShow=document.querySelector(".feedback_show");
// [...boxHeart].forEach((item) => item.addEventListener("click", function (e) {
//    e.preventDefault();
//    console.log(e.target);
//    e.target.setAttribute("id", "active-heart")

// }))



commentCick.addEventListener("click", function(){
    commentCick.classList.add("active-click");
    feedbackClick.classList.remove("active-click");
    feedbackShow.setAttribute("style", 'display:none');
    commentShow.removeAttribute("style", 'display:none');

})
feedbackClick.addEventListener("click", function(){
    feedbackClick.classList.add("active-click");
    commentCick.classList.remove("active-click");
    commentShow.setAttribute("style", 'display:none');
    feedbackShow.removeAttribute("style", 'display:none');

})

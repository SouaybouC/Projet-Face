/*
  * Welcome to your app's main JavaScript file!
  *
  * We recommend including the built version of this JavaScript file
  * (and its CSS file) in your base layout (base.html.twig).
  */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');


window.onscroll = function () {
    scrollFunction()
};


function scrollFunction(){
    if(document.body.scrollTop > 80 || document.documentElement.scrollTop > 80){
        document.getElementById("headernav").style.padding = "30px 0px";
    }else{
        document.getElementById("headernav").style.padding = "50px 0px";
    }
}
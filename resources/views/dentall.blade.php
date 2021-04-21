<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >


    <script src="jquery-2.2.3.min.js"></script>
    <script src="jquery-modal-video.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
  <!--  <link rel = "stylesheet" href = "modal-video.min.css">-->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

</head>
<body onload="load()">


<nav class = "header">

    <img onclick="window.location.reload()"  src="/img/2logo.png">

    <ul class = "nav_links">
        <div class="cloz">
            <img class="closing" src="/img/closing.png" height="25px"></div>
        <li onclick = "change(this)" onmouseover="big(this)" onmouseout="small(this)"><a href="#clinic"> {{__("О КЛИНИКЕ")}}</a> </li>
        <li  onclick = "change1(this)" onmouseover="big(this)" onmouseout="small(this)"> <a href="#uslugi"> {{__("УСЛУГИ")}}</a> </li>
        <li  onclick = "change2(this)" onmouseover="big(this)" onmouseout="small(this)"> <a href="#specialist"> {{__("СПЕЦИАЛИСТЫ")}}</a> </li>
        <li  onclick = "change3(this)" onmouseover="big(this)" onmouseout="small(this)"> <a href="#contacts"> {{__("КОНТАКТЫ")}}</a> </li>

        @php $locale = session()->get('locale'); @endphp

        <li> <a  href="en">EN</a><a  href="ru">  RU</a></li>

        </li>
    </ul>
    <div class = "burger">
        <div class="line1" ></div>
        <div class="line2" ></div>
        <div class="line3" ></div>
    </div>


</nav>
<!--/header-->

<style>
    body{
        margin: 0;
        padding: 0;
        font-family: Helvetica;
    }

    .dropdown-menu{
        display: contents;
    }
    .dropdown-item{
        width: 1%;
    }

    /*header*/
    /*.header-1{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        position: absolute;
        z-index: 1;
        font-size: 22px;
        font-family:Helvetica;
        text-decoration: none;
        margin-top: 40px;

    }*/
    /*.header{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        width: 100%;
        position: absolute;
        z-index: 1;
        font-size: 22px;
        font-family:Helvetica;
        text-decoration: none;
        margin-top: 20px;
    }*/
    /*.toggle{
        width: 100%;
        padding: 10px 20px;
        text-align: right;
        box-sizing: border-box;
        font-size: 30px;
        display: none;
    }*/
    /*@media (max-width: 768px) {
        /* .toggle{
             display: block;
             background-color: #c6a473;
         }
         .header{
             display: block;
             text-align: center;
             background-color: #c6a473;
             margin-top: 0;
         }
     *//*
        .questions_text{
            font-size: 18px;
        }
        #questions_btn{
            padding: 15px 60px;
        }
        .card{
            position: relative;
        }
    }*/
    .btn-play{
        display: flex;
        vertical-align: center;
        justify-content: right;
        text-align: right;
        padding: 0 200px 150px 0;
    }
    .js-modal-btn {
        text-decoration: none;
        outline: none;
        display: flex;
        right: 0;
        padding: 20px 20px;
        background-image: linear-gradient(to right, #fcf0c5 0%, #CDAA7D 51%, #9c6f2e 100%);
        box-shadow: 0 0 20px rgba(0,0,0,.1);
        transition: .5s;
        border-radius: 50%;
    }
    .js-modal-btn:hover {background-position:  right center;}

    .logoPhone{
        font-size: 24px;
    }
    nav {
        display: flex;
        justify-content: space-around;
        align-items: center;
        min-height: 8vh;
        background-color: #e0ae67e0;

        background-image: linear-gradient(rgba(224, 174, 103, 0.88),rgba(250, 245, 237, 0.84)), url("/img/bcrFon.jpg");
        background-position: top;
        background-repeat: no-repeat;
        background-size: cover;

    }
    .header img{
        animation: fadeInLeftBig; /* referring directly to the animation's @keyframe declaration */
        animation-duration: 0.5s;
    }
    .nav_links{
        display: flex;
        justify-content: space-around;
        width: 64%;
    }
    .nav_links li{
        list-style: none;
    }
    .burger div{
        width: 25px;
        height: 3px;
        background-color: black;
        margin: 5px;
        transition: all 0.3s ease;
    }
    .burger{
        display: none;
        cursor: pointer;
    }
    .closing{
        display: none;
    }
    .nav_links a{
        margin: 0;
        color: #6A6153;
        transition: transform 0.5s ease-in;
        text-decoration: none;
        font-size: 20px;
    }
    .nav_links a:hover{
        color: black;
    }

    .header img{
        height:45px;
        transition: transform 0.5s ease-in;

    }

    .header .closing{
        height: 25px;
    }

    @media screen and (max-width: 1100px) {
        .nav_links{
            width: 70%;
        }
    }
    @media screen and (max-width: 768px) {
        body{
            overflow-x: hidden;
        }
        .closing{
            display: flex;
            right: 0;
        }
        .nav_links{
            position: fixed;
            right: 0;
            height: 100%;
            top:0;
            background: linear-gradient(rgba(250, 245, 237, 0.84),rgba(224, 174, 103, 0.88));
            flex-direction: column;
            align-items: center;
            z-index: 2000;
            width: 100%;
            transform: translateX(100%);
        }
        .nav_links li{
            opacity: 1;

        }
        .burger{
            display: block;
        }
    }

    .nav-active{
        transform: translateX(0%);
    }
    .nav-n-active{
        transform: translateX(0%);
    }


    .main{
        background-image: linear-gradient(rgba(250, 245, 237, 0.84),rgba(250, 245, 237, 0.84)), url("/img/bcrFon.jpg");
        background-color: #cccccc;
        height: 920px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .text{
        text-transform: uppercase;
        position: absolute;
        margin-top: 250px;
        margin-left: 180px;
        opacity: 1;
        font-family: Helvetica;
    }
    #text t{
        color: #9c6f2e;
    }
    #img{
        position: relative;
        opacity: 0;
    }

    #text{
        margin-bottom: 10px;
        font-size: 45px;
        font-weight: bold;
        line-height: 1.5em;

    }
    #text2{
        margin-bottom: 55px;
        font-size: 22px;
        line-height: 1.5em;
    }
    #text3{
        font-size: 16px;
    }
    #text3 t{
        color: grey;
        line-height: 1em;
        text-transform: lowercase;
        font-size: 20px;
    }
    #btn1{
        margin-bottom: 115px;
        padding: 18px 75px;
        font-size: 23px;
        font-weight: bold;
        background: rgba(186, 146, 89, 0.81);
        border-radius: 5px;
        border:  rgba(186, 146, 89, 0.81);
        color: #EFFBF8;
        transition: background .1s
        linear, color .1s;
    }

    #btn1:hover{
        background: rgb(186, 146, 89);
        color: #f0f8ff;
    }
    .strelka{
        margin: 0 -80px -210px;
        transform: rotateZ(-20deg);
    }

    {
        position: absolute;
        width: 50%;
        padding: 30px;
        box-sizing: border-box;
        overflow: hidden;
        font-size: 0;
        letter-spacing: 0;
        background: #f9f9f9;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2), 0 10px 18px rgba(0,0,0,0.2);
        border-radius: 15px;
    }
    .form-at{
        background-color:rgba(250, 245, 237, 0.84) ;
        width: 100%;
        height: 100%;
        display: none;
        align-items: center;
        justify-content: center;
        position: fixed;
        z-index: 100;
        opacity:1;
        top: 0;
    }
    .form-at * {
        box-sizing: border-box;
        font-family: Verdana, sans-serif;
    }

    .closed{
        position: absolute;
        top: 0px;
        right: 0px;
        z-index: 250;
        cursor: pointer;
    }

    .validate-input-at,
    .no-validate-input-at {
        width: 100%;
        position: relative;
        background-color: #fff;
        border: 2px solid #9c6f2e;
        border-radius: 2px;
        margin-bottom: 20px;

    }
    .validate-input-at.w-50,
    .no-validate-input-at.w-50 {
        width: calc(50% - 10px);
        display: inline-block;
        margin-right: 10px;
    }
    .validate-input-at.w-50:first-child,
    .no-validate-input-at.w-50:first-child {
        margin-right: 20px;
    }
    .input-at {
        display: block;
        width: 100%;
        background: transparent;
        color: #000;
    }
    input.input-at {
        height: 50px;
        padding: 0 20px 0 20px;
        font-size: 16px;
        outline: none;
        border: none;
    }
    textarea.input-at {
        min-height: 170px;
        padding: 18px 20px;
        font-size: 16px;
        line-height: 22px;
        outline: none;
        border: none;
        resize: none;
    }
    textarea.input-at:focus,
    input.input-at:focus {
        border-color: transparent;
    }
    .focus-input-at {
        position: absolute;
        display: block;
        width: calc(100% + 2px);
        height: calc(100% + 2px);
        top: -1px;
        left: -1px;
        pointer-events: none;
        border: 2px solid #9c6f2e;
        border-radius: 2px;

        opacity: 1;
        transition: all 0.4s;
        transform: scaleX(1.1) scaleY(1.3);

    }
    .input-at:focus + .focus-input-at {
        visibility: visible;
        opacity: 1;
        transform: scale(1);
    }
    .form-at-btn {
        position: relative;
        display: block;
        padding: 0 40px;
        height: 50px;
        background-color: #9c6f2e;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        text-transform: uppercase;
        line-height: 1.2;
        transition: all 0.4s;
        margin: 0 auto;
        outline: none;
        border: none;
        cursor: pointer;
    }
    .form-at-btn:hover {
        background-color: #333333;
    }
    .form-at-btn[disabled] {
        opacity: .6;
        cursor: not-allowed;
    }
    .alert-validate::before {
        content: attr(data-validate);
        position: absolute;
        max-width: 70%;
        background-color: #fff;
        border: 1px solid #c80000;
        border-radius: 2px;
        padding: 4px 25px 4px 10px;
        top: 50%;
        transform: translateY(-50%);
        right: 12px;
        pointer-events: none;
        color: #c80000;
        font-size: 13px;
        line-height: 1.4;
        text-align: left;

        opacity: 1;
        transition: opacity 0.4s;
    }
    .alert-validate::after {
        content: "\f129";
        font-family: "FontAwesome";
        display: block;
        position: absolute;
        color: #c80000;
        font-size: 18px;
        font-weight: bold;
        top: 50%;
        transform: translateY(-50%);
        right: 22px;
    }
    .alert-validate:hover:before {
        visibility: visible;
        opacity: 1;
    }
    .error-at {
        color: red;
        padding: 10px 0;
    }

    .form-at input[type=checkbox] {
        display:none;
    }
    .form-at input[type=checkbox] + label {
        display: block;
        position: relative;
        margin: 0 0 20px 34px;
        font-size: 13px;
        line-height: 24px;
        color: #333333;
    }
    .form-at input[type=checkbox] + label:before {
        box-sizing: border-box;
        position: absolute;
        content: '';
        width: 26px;
        height: 26px;
        line-height: 22px;
        left: -34px;
        border: 2px solid #c6a473;
        border-radius: 2px;
    }
    .form-at input[type=checkbox]:checked + label:before{
        content: '\2714';
        color:#c80000;
        font-size: 14px;
        text-align: center;
        font-weight: bold;
        border: 2px solid #9c6f2e;
    }
    @media (max-width: 768px) {
        .validate-input-at.w-50 {
            width: 100%;
        }
        .validate-input-at.w-50:first-child {
            margin-right: 0;
        }
        .alert-validate::before {
            visibility: visible;
            opacity: 1;
        }
    }

    #о_клинике, #услуги, #специалисты, #контакты{
        cursor: pointer;
    }
    .clinic_header h1{
        font-size: 35px;
        text-transform: uppercase;
        padding-top: 130px;
        font-weight: bold;
        max-width: 1200px;
        margin: 0 auto;
        animation: zoomIn; /* referring directly to the animation's @keyframe declaration */
        animation-duration: 0.5s;
    }
    .clinic_header h1 t{
        color: #9c6f2e;

    }
    .clinic_header h2{
        padding-top: 40px;
        font-size: 50px;
        text-transform: uppercase;
        color:rgba(194, 194, 192, 0.40);
        letter-spacing: 2px;
        max-width: 1200px;
        margin: 0 auto;
        animation: zoomIn;
        animation-duration: 0.5s;
    }

    .clinic_about{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        max-width: 1200px;
        margin: 0 auto;
    }

    .clinic_text{
        font-size: 20px;
        padding-top: 100px ;
    }

    .clinic_more a{
        padding-left: 10px;
        text-decoration: none;
        color: grey;
        font-size: 15px;
    }
    .clinic_more t{
        padding-left: 20px;
    }
    .name{
        padding-top: 20px;
        font-size: 29px;
        font-weight: bolder;
        letter-spacing: 2px;
        padding-bottom: 200px;
    }
    .name t{
        color: grey;
    }

    .clinic_item{
        width: 40%;
        animation: zoomIn; /* referring directly to the animation's @keyframe declaration */
        animation-duration: 2s;
    }
    .clinic_img img{
        width: 90%;
    }
    .card_item{
        box-shadow: 10px 10px 30px rgba(0, 0 ,0 ,0.2);
        overflow: hidden;
        position: relative;
        padding: 50px 80px;
        min-width: 300px;
        margin-right: 15px;
        margin-left: 15px;
        margin-bottom: 30px;
        width: 24%;
    }
    .card_img {
        object-fit: cover;
        box-sizing: border-box;
    }

    .clinic_cards{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        text-align: center;
        align-items: center;
    }

    .card_text{
        font-size: 20px;
        font-weight: bold;
        padding-top: 15px;
        width: 100%;
    }

    .clinic_btn{
        padding-top: 90px;
        text-align: center;
        color: white;
    }
    #clinic_btn{
        margin-bottom: 115px;
        padding: 18px 55px;
        font-size: 23px;
        font-weight: bold;
        background: rgba(186, 146, 89, 0.81);
        border-radius: 5px;
        border:  rgba(186, 146, 89, 0.81);
        color: #EFFBF8;
        transition: background .1s
        linear, color .1s;
    }

    #clinic_btn:hover{
        background: rgb(186, 146, 89);
        color: #f0f8ff;
    }

    .atmos_header{
        max-width: 1500px;
        margin: 0 auto;
    }
    .atmos_header h1{
        font-size: 35px;
        font-weight: bold;
        letter-spacing: 2px;
    }
    .atmos_header t{
        color: #9c6f2e;
    }
    .clinic_atmos{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .atmos_img{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding-bottom: 90px;
        max-width: 1200px;
        margin: 0 auto;
    }
    .atmos1{
        padding-bottom: 20px;
        padding-right: 15px;

    }
    .atm_img2 img{
        height:473px;
    }
    .atm_img4 img{
        height:890px;
    }
    .mySlides {
        display:none;
        height:800px;
        width:100%;
    }


    #btn_left, #btn_right{
        position: relative;
        text-align: right;
        top: -400px;
        z-index: 2;
        background: rgba(255, 247, 229, 0.6);
        border-radius: 50px;
        color: grey;
    }

    .mySlides2{
        display:none;
        height:400px;
        width:100%;
    }

    #btn_left2, #btn_right2{
        position: relative;
        text-align: right;
        top: -230px;
        z-index: 2;
        background: rgba(255, 247, 229, 0.6);
        border-radius: 50px;
        color: grey;
    }

    .atm_btn{
        display: flex;
        justify-content: space-between;
        padding-top: -200px;
    }
    .uslugi_header h1{
        font-weight: bold;
        text-align: center;
        letter-spacing: 2px;
        padding-bottom: 30px;
        line-height: 45px;
    }
    .uslugi_header h1 t{
        color: #9c6f2e;
    }

    /*ceny*/


    .uslugi_ceny {
        max-width: 1000px;
        margin: 0 auto;
        padding-top: 50px;

    }

    .uslugi_ceny .acor-body {
        width: calc(100% - 40px);
        margin: 0 auto;
        height: 0;
        color: rgba(0, 0, 0, 0);
        /*  background-color: 	#FFFFF0;*/
        line-height: 15px;
        padding: 0 30px;
        box-sizing: border-box;
        transition: color 0.5s, padding 0.5s;
        overflow: hidden;
        font-family: Verdana, sans-serif;
        font-size: 13px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2), 0 10px 16px rgba(0,0,0,0.2);


        background-image: linear-gradient(rgba(250, 245, 237, 0.84),rgba(250, 245, 237, 0.84)), url("/img/bcrFon.jpg");
        background-color: #cccccc;
        /* height: 1000px;*/
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }
    .uslugi_ceny .acor-body p {
        margin: 0 0 10px;
        display: flex;
        flex-wrap:nowrap;
        justify-content: space-between;
    }
    .uslugi_ceny .acor-body t{
        margin: 0 30px 0 0;
    }
    .uslugi_ceny .acor-body  hr{
        margin-top: 8px;
        margin-bottom: 8px;
    }
    .uslugi_ceny label {
        cursor: pointer;
        /*  background-color: #EECFA1;*/
        display: block;
        padding: 15px 20px;
        width: 100%;
        color:  #6A6153;
        font-weight: 300;
        box-sizing: border-box;
        z-index: 100;
        font-family: Verdana, sans-serif;
        font-size: 20px;
        margin: 0 0 5px;
        transition: color .35s;
        border-radius: 10px;

        background: linear-gradient(rgba(207, 165, 99, 0.84),rgba(2250, 230, 197, 0.84));
    }
    .uslugi_ceny label:hover {
        color: white;
    }
    .uslugi_ceny input{
        display: none;
    }
    .uslugi_ceny label:before {
        content: '\276F';
        float: right;
    }
    .uslugi_ceny input:checked + label {
        background-color: #CDAA7D;
        color: white;
        box-shadow: 0 8px 26px rgba(0,0,0,0.4), 0 28px 30px rgba(0,0,0,0.3);
    }
    .uslugi_ceny input:checked + label:before {
        transition: transform .35s;
        transform: rotate(90deg);
    }
    .uslugi_ceny input:checked + label + .acor-body {
        height: auto;
        margin-top: -5px;
        color: #000;
        padding: 20px 30px 10px;
    }

    .uslugi_btn{
        padding-top: 90px;
        text-align: center;
        color: white;
    }
    .uslugi_btn p{
        color: grey;
        font-size: 18px;
        padding-bottom: 22px;
    }
    #uslugi_btn{
        margin-bottom: 215px;
        padding: 18px 75px;
        font-size: 23px;
        font-weight: bold;
        background: rgba(186, 146, 89, 0.81);
        border-radius: 5px;
        border:  rgba(186, 146, 89, 0.81);
        color: #EFFBF8;
        transition: background .1s
        linear, color .1s;
    }

    #uslugi_btn:hover{
        background: rgb(186, 146, 89);
        color: #f0f8ff;
    }
    .upbtn {
        z-index: 9999;
        width: 60px;
        height: 60px;
        color: #FFF;
        position: fixed;
        bottom: 20px;
        right: 20px;
        cursor: pointer;
        border:5px solid rgba(250, 245, 237, 0.84);
        border-radius:50%;
        transform: scale(0);
        transition: all .7s ease-in-out;
        background-position: center center;
        background-repeat: no-repeat;
        background-color: #c6a473;
        background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMS4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ5MS44NTggNDkxLjg1OCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDkxLjg1OCA0OTEuODU4OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTQ5MS44NTgsNDQyLjQ2MWMwLDEzLjkzMS0xMS4yOTMsMjUuMjI0LTI1LjIyNCwyNS4yMjRMMjQ1LjkzLDM3My4wOTdMMjUuMjI0LDQ2Ny42ODYgICAgQzExLjI5Miw0NjcuNjg2LDAsNDU2LjM5MiwwLDQ0Mi40NjFMMjI3LjAxMSwzMi41OGMwLDAsMTguOTE4LTE4LjkxOCwzNy44MzQsMEMyODMuNzY0LDUxLjQ5OSw0OTEuODU4LDQ0Mi40NjEsNDkxLjg1OCw0NDIuNDYxeiIgZmlsbD0iI0ZGRkZGRiIvPgoJPC9nPgoJPGc+Cgk8L2c+Cgk8Zz4KCTwvZz4KCTxnPgoJPC9nPgoJPGc+Cgk8L2c+Cgk8Zz4KCTwvZz4KCTxnPgoJPC9nPgoJPGc+Cgk8L2c+Cgk8Zz4KCTwvZz4KCTxnPgoJPC9nPgoJPGc+Cgk8L2c+Cgk8Zz4KCTwvZz4KCTxnPgoJPC9nPgoJPGc+Cgk8L2c+Cgk8Zz4KCTwvZz4KCTxnPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=)
    }
    .upbtn:hover {
        transform: scale(1.2)!important;
    }
    #btn_ceny{
        background: #fcf0c5;
    }
    .delitel{
        width: 100%;
        height: 100px;
        background-color: #edc077d7;
        position: relative;
        margin-bottom: 200px;
        background-position: center;
        background-repeat: no-repeat;
        background-image: linear-gradient(rgba(237, 192, 119, 0.84),rgba(250, 230, 197, 0.84)), url("bcrFon.jpg");
        background-size: cover;
        position: relative;
    }

    .specialist_text{
        font-size: 34px;
        font-weight: bold;
        letter-spacing: 1px;
        max-width: 1159px;
        margin:0 auto;
        padding-bottom: 30px;
        display: flex;
        justify-content: center;
    }
    .specialist_text t{
        color: #9c6f2e;
    }
    .specialist_card{
        max-width: 1259px;
        margin:0 auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        text-align: center;
        padding-bottom: 100px;
    }
    .specialist_img img{
        width: 310px;
    }
    .specialist_name h4{
        font-weight: bold;
    }
    .specialist_name p{
        font-size: 16px;
        color: grey;
    }
    .specialist_btn{
        text-align: center;
    }
    #specialist_btn{
        margin-bottom: 215px;
        padding: 18px 75px;
        font-size: 23px;
        font-weight: bold;
        background: rgba(186, 146, 89, 0.81);
        border-radius: 5px;
        border:  rgba(186, 146, 89, 0.81);
        color: #EFFBF8;
        transition: background .1s
        linear, color .1s;
    }

    #specialist_btn:hover{
        background: rgb(186, 146, 89);
        color: #f0f8ff;
    }




    .questions{
        background-image: linear-gradient(rgba(179, 161, 136, 0.94),rgba(179, 161, 136, 0.94)),url();
        height: 536px;
        background-color: #cccccc;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        display: flex;
        justify-content: center;
    }

    .questions_words{
        background-color: white;
        height: 270px;
        width: 50%;
        position: absolute;
        text-align: center;
        padding:50px;
        top:188px;
        border-radius:10px ;
    }

    .questions_text{
        top: 250px;
        font-size: 27px;
        font-weight: bold;
    }

    .questions_text t{
        color: #9c6f2e;
    }

    .questions_btn {
        margin-top: 30px;
        text-align: center;
        color: white;
        text-decoration: none;
    }

    .questions_btn a{
        text-decoration: none;
        color: white;
    }
    #questions_btn {
        padding: 18px 75px;
        font-size: 23px;
        font-weight: bold;
        background: rgba(186, 146, 89, 0.81);
        border-radius: 5px;
        border:  rgba(186, 146, 89, 0.81);
        color: #EFFBF8;
    }
    #map{
        width:100%;
        height:650px
    }
    .map-popup {
        background: #FFF;
        padding: 20px;
        height: 100px;
        color: #000;
        border: 3px solid #9c6f2e;
        box-sizing: border-box;
    }
    .map-popup h2 {
        margin: 0;
        font-size: 22px;
        color: black;
    }
    .map-icon {
        visibility: visible!important; /* Оставляем иконку видимой при открытии попапа */
        display: inline!important;
    }
    .leaflet-popup-tip-container {
        display: none!important; /* Убираем родной указатель при открытом попапе */
    }
    .leaflet-popup-content {
        margin:0!important;    /* Убираем отступы у попапа */
    }

    .card{
        position: absolute;
        background-color: white;
        padding: 60px;
        box-sizing: border-box;
        height: 400px;
        width: 35%;
        z-index: 200;
        margin-left: 180px ;
        text-align: left;
        margin-top: 120px;
        border: solid 5px #CDAA7D;
    }

    .contacts_header h3{
        padding-bottom: 35px;
        letter-spacing: 2px;
        font-weight: bold;
    }
    .contacts_header t{
        color: #9c6f2e;
    }

    .contacts_text{
        font-size: 18px;
    }
    .contacts_text p{
        padding-top: 10px;
        color: dimgrey;
    }
    .contacts_icon img{
        padding-top: 10px;
        padding-right: 10px;
    }

    @media (max-width: 1203px) {

        .text{
            margin-top: 250px;
            margin-left: 100px;
        }
        #text{
            font-size: 40px;
        }
        .btn-play{
            padding: 0 70px 150px 0 ;
        }
        .card{
            padding: 30px 20px 0 40px;
        }
        .clinic_header h1,.clinic_header h2{
            padding-left: 50px;
        }
        .atmos_header h1{
            padding-bottom: 0;
            font-size: 30px;
            margin-top: 10px;
        }
        .js-modal-btn {
            padding: 10px 10px;
            width: 45px;
        }
        .clinic_text{
            font-size: 15px;
            padding-top: 80px;
        }

        .uslugi_header h1{
            font-size: 35px;
        }

    }
    @media (max-width: 860px) {

        .uslugi_header h1{
            font-size: 32px;
        }
        .js-modal-btn {
            padding: 10px 10px;
            width: 35px;
        }
        .btn-play .js-modal-btn img{
            width: 15px;
        }

        #btn_left, #btn_right{
            top: -250px;
        }
        #btn_left2, #btn_right2{
            top: -100px;
        }
        .atm_img2 img{
            height: 340px;
        }
        .atm_img4 img{
            height: 600px;
        }
        .mySlides{
            height:600px;
        }
        .mySlides2{
            height:250px;

        }
        #map{
            height: 400px;
        }
        .text{
            margin-left: 50px;
            margin-top: 250px;
        }
        #text{
            font-size: 33px;
        }
        #text2{
            font-size: 20px;
        }

        .clinic_header h1{
            padding-left: 50px;
            font-size: 30px;
        }
        .clinic_header h2{
            padding-left: 50px;
            font-size: 40px;
        }
        .clinic_text{
            font-size: 14px;
            width: 100%;
        }
        .clinic_item{
            width: 40%;
        }
        .clinic_img img{
            width: 100%;
            padding-top: 20px;
        }
        .clinic_img{
            width: 80%;
            padding-top: 60px;
        }
        .clinic_about .name{
            font-size: 20px;
        }

        .card{
            position: relative;
            height: 300px;
            width: 100%;
            margin:0;
            padding-top: 18px;
            text-align: center;
        }

        .atmos_header h1{
            padding-bottom: 0;
            font-size: 25px;
        }
        .contacts_text p{
            font-size: 17px ;
            padding-top: 5px;
        }
        .btn-play{
            padding: 0 50px 150px 0 ;
        }

        .questions{
            height: 500px;
        }
        .questions_words{
            top: 130px;
            padding: 20px;
            height: 250px;
        }
        .questions_words .questions_text {
            font-size: 19px;
            padding-top: 30px;
        }
        #questions_btn{
            padding: 14px 40px;
            font-size: 15px;
        }
    }

    @media (max-width: 740px)  {

        .clinic_about .name{
            font-size: 16px;
        }
        .clinic_text{
            font-size: 13px;
        }
        .clinic_item{
            width: 45%;
        }
        .uslugi_header h1{
            font-size: 27px;
            line-height: 30px;
        }
        .specialist_text{
            font-size: 27px;
        }
    }

    @media (max-width: 705px) {
        .atmos_header h1{
            letter-spacing:0;
        }
        .btn-play{
            padding: 0 5px 100px 0;
        }
    }

    @media (max-width: 620px)  {

        .main{
            height: 700px;
        }
        .specialist_text{
            font-size: 24px;
            padding-left: 80px;
        }
        .uslugi_header h1{
            font-size: 24px;
            line-height: 28px;
        }
        .clinic_text{
            font-size: 12px;
        }
        .text{
            margin-left: 50px;
            margin-top: 200px;
        }
        #text{
            font-size: 22.5px;
        }
        #text2{
            font-size: 15px;
        }
        #text3, #text3 t{
            font-size: 13px;
        }
        .clinic_header h1{
            padding-left: 25px;
            font-size:28px ;
        }
        .clinic_header h2{
            padding-left: 25px;
            font-size:35px ;
        }
        .atmos_header h1{
            letter-spacing:0;
            padding-left: 50px;
        }
        .btn-play{
            padding: 0 10px 50px 220px;
        }
        .btn-play .js-modal-btn img{
            width: 20px;
        }
        .js-modal-btn{
            width: 40px;
        }

    }
    @media (max-width: 550px)  {

        .clinic_item{
            width: 75%;
        }
        .clinic_text{
            font-size:13px ;
        }
        .clinic_header h1{
            padding-left: 50px;
            font-size:28px ;
        }
        .clinic_header h2{
            padding-left: 50px;
            font-size:35px ;
        }
    }

    .podval{
        height: 150px;
        background-color: black;
    }

    .container {
        width: 700px;
        margin: 0 auto;
        font-size: 20px;

    }




</style>


<div class = "main">

    <div class = "text">
        <h1 id = "text">{{__("Эстетическая")}}<t>{{__(" стоматология")}}</t></br> {{__("нового поколения")}}</h1>
        <p id = "text2">{{__("комплексный подход К ПРОЦЕССУ")}} </br> {{__("СТОМАТОЛОГИЧЕСКОГО ОЗДОРОВЛЕНИЯ")}}</p>
        <button  id ="btn1"  type="button" onclick="former()" ><a href="https://api.whatsapp.com/send/?phone=79189322020&text&app_absent=0" style="color: white; text-decoration: none ">{{__("Записаться")}}</a></button>
        <img class = "strelka"  src="/img/strelka.png" height="115px">
        <p id="text3">{{__("Детальная диагностика")}} </br><t>{{__("для составления плана лечения")}}</t></p>
    </div>

    <div class="form-at">

        <div class="form-at-content">
            <img onclick="closed()" class="closed" src="/img/close.png" width="30px">
            <div class="validate-input-at w-50" data-validate="Обязательное поле">
                <input class="input-at" type="text" name="name-at" placeholder="Ваше имя" />
                <span class="focus-input-at"></span>
            </div>
            <div class="validate-input-at w-50" data-validate="Обязательное поле">
                <input class="input-at" type="text" name="email-at" placeholder="Ваш телефон или email" />
                <span class="focus-input-at"></span>
            </div>
            <div class="validate-input-at" data-validate="Обязательное поле">
                <textarea class="input-at" name="message-at" placeholder="Ваше сообщение"></textarea>
                <span class="focus-input-at"></span>
            </div>
            <input checked="checked" class="input-at" id="checkbox-at" type="checkbox" name="checkbox-at" onchange="document.getElementById('submit-at').disabled = !this.checked;" />
            <label for="checkbox-at">
                Настоящим подтверждаю, что я ознакомлен и согласен на обработку моих данных</a>
            </label>
            <input type="hidden" name="subject-at" value="Тема формы">
            <button onclick="send()" id="submit-at" class="form-at-btn">Отправить</button>
        </div>
    </div>
    <div class="result-at"></div>

</div>


<div class = "clinic" id="clinic">

    <div class="clinic_header">
        <h1>{{__("почему ")}} <t>{{__("выбирают")}}</t> {{__("именно нас?")}}</h1>
        <h2>style smile</h2>
    </div>

    <div class = "clinic_about">

        <div class = "clinic_item">
            <div class="clinic_text">
                {{__("Что такое Style Smile? Как бы странно это")}}</br>
                {{__("не звучало, но... это — клиника для врачей!")}}</br></br>
                {{__("Наша философия заключается в объединении")}}
                </br>{{__("людей, увлеченных стоматологией, которым")}}</br>
                {{__("важна команда, эстетика и технологичность")}}</br>
                {{__("места, где они работают.")}}</br></br>
                {{__("У нас продумана каждая деталь — от дизайнa")}}</br>
                {{__("до оборудования и его расположения: у всего")}}
                </br>{{__("есть свой смысл и своя философия.")}}</br></br>
                {{__("Мы считаем, что если рабочее место будет")}}
                </br>{{__("оснащено современными инструментами, а")}} </br>
                {{__("клиника будет местом, где приятно")}} </br>
                {{__("находиться, то и результаты всегда будут")}} </br>
                {{__("качественнее. А ведь это и нужно пациентам..?")}}</br></br>
                <div class="clinic_more"><a href="#clinic_cards"><img width="55px" src="http://www.stroi-led.ru/image/cache/catalog/100004245-800x800.jpg"><t>{{__("подробнее")}}</t></a></div>

            </div>
        </div>

        <div class = "clinic_item">
            <div class="clinic_img">
                <img src="/img/haddur.webp" >

            </div>
            <div class = "name">{{__("Хаддур Маджед")}}</br>
                <t>{{__("основатель клиники")}}</t></div>
        </div>

    </div>


    <div class = "clinic_cards" id="clinic_cards">
        <div class="card_item" >
            <div class="card_img"><img src="/img/card1.svg"></div>
            <div class="card_text">{{__("КОМПЛЕКСНЫЙ ПОДХОД")}} </div>
        </div>
        <div class="card_item">
            <div class="card_img"><img src="/img/card2.svg"></div>
            <div class="card_text">{{__("НОВЕЙШЕЕ ОБОРУДОВАНИЕ")}} </div>
        </div>
        <div class="card_item">
            <div class="card_img"><img src="/img/card3.svg"></div>
            <div class="card_text">{{__("ОПЫТНЫЕ СПЕЦИАЛИСТЫ")}} </div>
        </div>

        <div class="card_item">
            <div class="card_img"><img src="/img/card4.svg"></div>
            <div class="card_text">{{__("ЭСТЕТИЧНЫЙ")}}  </br>{{__("ДИЗАЙН")}}</div>
        </div>
        <div class="card_item">
            <div class="card_img"><img src="/img/card5.svg"></div>
            <div class="card_text">{{__("ПРИЯТНАЯ")}}  </br>{{__("АТМОCФЕРА")}}</div>
        </div>
        <div class="card_item">
            <div class="card_img"><img src="/img/card6.svg"></div>
            <div class="card_text">{{__("РАБОТА НА")}}  </br>{{__("РЕЗУЛЬТАТ")}} </div>
        </div>
    </div>

    <div class="clinic_btn">
        <button id="clinic_btn" type="button" >
            <a href="https://api.whatsapp.com/send/?phone=79189322020&text&app_absent=0" style="color: white; text-decoration: none ">{{__("Оставить заявку")}}</a></button>
    </div>

    <div class="clinic_atmos">
        <div class="atmos_header">
            <h1>{{__("ОЩУТИТЕ")}} <t>{{__("АТМОСФЕРУ ")}}</t>{{__("В НАШЕЙ КЛИНИКЕ")}} </h1>
        </div>
        <div class="btn-play">
            <button class="js-modal-btn" data-video-id="8DoZwG9o7q8">
                <img  width="25px" src="/img/video-play.png">
            </button></div>

        <div class="atmos_img">
            <div class="atmos1">
                <div class = "atm_img1" >
                    <img class="mySlides" src="/img/atmos1.webp"  >
                    <img class="mySlides" src="/img/atmos1(2).webp" >
                    <img class="mySlides" src="/img/atmos1(3).webp" >
                    <div class="atm_btn">
                        <button class="btn btn-default" id="btn_left" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="btn btn-default" id="btn_right" onclick="plusDivs(1)">&#10095;</button>
                    </div>
                </div>

                <div class = "atm_img2">
                    <img  src="/img/atm2.jpg">
                </div>
            </div>

            <div class="atmos2">
                <div class = "atm_img3">
                    <img class="mySlides2" src="/img/bcrFon.jpg"  >
                    <img class="mySlides2" src="/img/atmos2(2).webp" >
                    <div class="atm_btn">
                        <button class="btn btn-default" id="btn_left2" onclick="plusDivs2(-1)">&#10094;</button>
                        <button class="btn btn-default" id="btn_right2" onclick="plusDivs2(1)">&#10095;</button>
                    </div>
                </div>

                <div class = "atm_img4">
                    <img  src="/img/atmos3.jpg">
                </div>
            </div>

        </div>

    </div>


    <div class="upbtn"> </div>
</div>

<div class="uslugi" id="uslugi">
    <div class="uslugi_header">
        <h1> {{__("ВЫ МОЖЕТЕ ОБРАТИТЬСЯ")}} </br>{{__("ПО СЛЕДУЮЩИМ")}} <t>{{__("УСЛУГАМ")}}</t></h1>
    </div>


    <div class="uslugi_ceny">

        <input type="radio" name="acor" id="acor1" checked="checked" />
        <label for="acor1">{{__("Импланталогия")}}</label>
        <div class="acor-body">
            <p><t>{{__("Установка временного имплантата или мини-имплантата")}} </t>12.000 руб</p><hr>
            <p><t>{{__("Установка формирователя десны Dentium")}} </t>3.000 руб</p><hr>
            <p><t>{{__("Пластика десны при установке формирователя десны")}}  </t>5.000 руб</p><hr>
            <p><t>{{__("Пластика десны в области имплантата")}} </t>10.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по системе Smartbuilder")}}</t>20.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине в области 1-2")}} зубов (всё включено) </t>30.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине в области сегмента (всё включено)")}} </t>45.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине и высоте в области (всё включено) 1-2 зубов ")}}</t>40.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине и высоте в области сегмента (всё включено)")}} </t>60.000 руб</p><hr>
            <p><t>{{__("Открытый синуслифтинг (всё включено) ")}}</t>от 60.000 руб</p><hr>
            <p><t>{{__("Закрытый синуслифтинг")}} </t>10.000-30.000 руб</p><hr>
            <p><t>{{__("Лечение периимплантита ")}}</t>10.000 руб</p><hr>
            <p><t>{{__("Закрытие рецессии")}} </t>2.000-7.000 руб</p><hr>
            <p><t>{{__("Забор соединительнотканного трансплантата ")}}</t>5.000 руб</p><hr>
            <p><t>{{__("Кюретаж в области 1 зуба ")}}</t>1.000-2.000 руб</p><hr>
            <p><t>{{__("Внесение костнопластического материала в лунку зуба")}}</t>3.000 руб</p><hr>
            <p><t>{{__("Гингивотомия в области 1 зуба")}} </t>1.000-2.000 руб</p><hr>
            <p><t>{{__("Металлокерамическая коронка с опорой на имплант на индивидуальном титановом абатменте")}} </t>20.000 руб</p>
        </div>

        <input type="radio" name="acor" id="acor2" />
        <label for="acor2">{{__("Терапия")}}</label>
        <div class="acor-body">
            <p><t>{{__("Установка временного имплантата или мини-имплантата")}} </t>12.000 руб</p><hr>
            <p><t>{{__("Установка формирователя десны Dentium")}} </t>3.000 руб</p><hr>
            <p><t>{{__("Пластика десны при установке формирователя десны")}}  </t>5.000 руб</p><hr>
            <p><t>{{__("Пластика десны в области имплантата")}} </t>10.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по системе Smartbuilder")}}</t>20.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине в области 1-2")}} зубов (всё включено) </t>30.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине в области сегмента (всё включено)")}} </t>45.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине и высоте в области (всё включено) 1-2 зубов ")}}</t>40.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине и высоте в области сегмента (всё включено)")}} </t>60.000 руб</p><hr>
            <p><t>{{__("Открытый синуслифтинг (всё включено) ")}}</t>от 60.000 руб</p><hr>
            <p><t>{{__("Закрытый синуслифтинг")}} </t>10.000-30.000 руб</p><hr>
            <p><t>{{__("Лечение периимплантита ")}}</t>10.000 руб</p><hr>
            <p><t>{{__("Закрытие рецессии")}} </t>2.000-7.000 руб</p><hr>
            <p><t>{{__("Забор соединительнотканного трансплантата ")}}</t>5.000 руб</p><hr>
            <p><t>{{__("Кюретаж в области 1 зуба ")}}</t>1.000-2.000 руб</p><hr>
            <p><t>{{__("Внесение костнопластического материала в лунку зуба")}}</t>3.000 руб</p><hr>
            <p><t>{{__("Гингивотомия в области 1 зуба")}} </t>1.000-2.000 руб</p><hr>
            <p><t>{{__("Металлокерамическая коронка с опорой на имплант на индивидуальном титановом абатменте")}} </t>20.000 руб</p>
        </div>

        <input type="radio" name="acor" id="acor3" />
        <label for="acor3">{{__("Ортопедия")}}</label>
        <div class="acor-body">
            <p><t>{{__("Установка временного имплантата или мини-имплантата")}} </t>12.000 руб</p><hr>
            <p><t>{{__("Установка формирователя десны Dentium")}} </t>3.000 руб</p><hr>
            <p><t>{{__("Пластика десны при установке формирователя десны")}}  </t>5.000 руб</p><hr>
            <p><t>{{__("Пластика десны в области имплантата")}} </t>10.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по системе Smartbuilder")}}</t>20.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине в области 1-2")}} зубов (всё включено) </t>30.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине в области сегмента (всё включено)")}} </t>45.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине и высоте в области (всё включено) 1-2 зубов ")}}</t>40.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине и высоте в области сегмента (всё включено)")}} </t>60.000 руб</p><hr>
            <p><t>{{__("Открытый синуслифтинг (всё включено) ")}}</t>от 60.000 руб</p><hr>
            <p><t>{{__("Закрытый синуслифтинг")}} </t>10.000-30.000 руб</p><hr>
            <p><t>{{__("Лечение периимплантита ")}}</t>10.000 руб</p><hr>
            <p><t>{{__("Закрытие рецессии")}} </t>2.000-7.000 руб</p><hr>
            <p><t>{{__("Забор соединительнотканного трансплантата ")}}</t>5.000 руб</p><hr>
            <p><t>{{__("Кюретаж в области 1 зуба ")}}</t>1.000-2.000 руб</p><hr>
            <p><t>{{__("Внесение костнопластического материала в лунку зуба")}}</t>3.000 руб</p><hr>
            <p><t>{{__("Гингивотомия в области 1 зуба")}} </t>1.000-2.000 руб</p><hr>
            <p><t>{{__("Металлокерамическая коронка с опорой на имплант на индивидуальном титановом абатменте")}} </t>20.000 руб</p>

        </div>

        <input type="radio" name="acor" id="acor4" />
        <label for="acor4">{{__("Хирургия")}}</label>
        <div class="acor-body">
            <p><t>{{__("Установка временного имплантата или мини-имплантата")}} </t>12.000 руб</p><hr>
            <p><t>{{__("Установка формирователя десны Dentium")}} </t>3.000 руб</p><hr>
            <p><t>{{__("Пластика десны при установке формирователя десны")}}  </t>5.000 руб</p><hr>
            <p><t>{{__("Пластика десны в области имплантата")}} </t>10.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по системе Smartbuilder")}}</t>20.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине в области 1-2")}} зубов (всё включено) </t>30.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине в области сегмента (всё включено)")}} </t>45.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине и высоте в области (всё включено) 1-2 зубов ")}}</t>40.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине и высоте в области сегмента (всё включено)")}} </t>60.000 руб</p><hr>
            <p><t>{{__("Открытый синуслифтинг (всё включено) ")}}</t>от 60.000 руб</p><hr>
            <p><t>{{__("Закрытый синуслифтинг")}} </t>10.000-30.000 руб</p><hr>
            <p><t>{{__("Лечение периимплантита ")}}</t>10.000 руб</p><hr>
            <p><t>{{__("Закрытие рецессии")}} </t>2.000-7.000 руб</p><hr>
            <p><t>{{__("Забор соединительнотканного трансплантата ")}}</t>5.000 руб</p><hr>
            <p><t>{{__("Кюретаж в области 1 зуба ")}}</t>1.000-2.000 руб</p><hr>
            <p><t>{{__("Внесение костнопластического материала в лунку зуба")}}</t>3.000 руб</p><hr>
            <p><t>{{__("Гингивотомия в области 1 зуба")}} </t>1.000-2.000 руб</p><hr>
            <p><t>{{__("Металлокерамическая коронка с опорой на имплант на индивидуальном титановом абатменте")}} </t>20.000 руб</p>

        </div>

        <input type="radio" name="acor" id="acor5" />
        <label for="acor5">{{__("Ортодонтия")}}</label>
        <div class="acor-body">
            <p><t>{{__("Установка временного имплантата или мини-имплантата")}} </t>12.000 руб</p><hr>
            <p><t>{{__("Установка формирователя десны Dentium")}} </t>3.000 руб</p><hr>
            <p><t>{{__("Пластика десны при установке формирователя десны")}}  </t>5.000 руб</p><hr>
            <p><t>{{__("Пластика десны в области имплантата")}} </t>10.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по системе Smartbuilder")}}</t>20.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине в области 1-2")}} зубов (всё включено) </t>30.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине в области сегмента (всё включено)")}} </t>45.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине и высоте в области (всё включено) 1-2 зубов ")}}</t>40.000 руб</p><hr>
            <p><t>{{__("Направленная костная регенерация по ширине и высоте в области сегмента (всё включено)")}} </t>60.000 руб</p><hr>
            <p><t>{{__("Открытый синуслифтинг (всё включено) ")}}</t>от 60.000 руб</p><hr>
            <p><t>{{__("Закрытый синуслифтинг")}} </t>10.000-30.000 руб</p><hr>
            <p><t>{{__("Лечение периимплантита ")}}</t>10.000 руб</p><hr>
            <p><t>{{__("Закрытие рецессии")}} </t>2.000-7.000 руб</p><hr>
            <p><t>{{__("Забор соединительнотканного трансплантата ")}}</t>5.000 руб</p><hr>
            <p><t>{{__("Кюретаж в области 1 зуба ")}}</t>1.000-2.000 руб</p><hr>
            <p><t>{{__("Внесение костнопластического материала в лунку зуба")}}</t>3.000 руб</p><hr>
            <p><t>{{__("Гингивотомия в области 1 зуба")}} </t>1.000-2.000 руб</p><hr>
            <p><t>{{__("Металлокерамическая коронка с опорой на имплант на индивидуальном титановом абатменте")}} </t>20.000 руб</p>

        </div>

    </div>



    <div class="uslugi_btn">
        <p>{{__("Первичная консультация")}} - 1000 руб</p>
        <button id ="uslugi_btn"  type="button" >
            <a href="https://api.whatsapp.com/send/?phone=79189322020&text&app_absent=0" style="color: white; text-decoration: none ">{{__("Записаться")}}</a></button>
    </div>

</div>


<div class="specialist" id="specialist">

    <div class="delitel"></div>
    <div class="specialist_text"><p>{{__("ДОВЕРЬТЕСЬ НАШИМ ")}}<t>{{__("СПЕЦИАЛИСТАМ")}}</t></p></div>

    <div class="specialist_card">
        <div class ="specialist-card-item">
            <div class="specialist_img"><img src="https://thumb.tildacdn.com/tild3937-3738-4331-b864-323630356566/-/resize/672x/-/format/webp/IMG_5459_1.jpg"></div>
            <div class="specialist_name">
                <h4>{{__("ХИРУРГ-ИМПЛАНТОЛОГ")}}</h4>
                <p>{{__("Опинион-лидер")}} </br>
                    {{__("и клинический консультант")}}</br>
                    {{__("экспертного уровня компании")}} </br>
                    MIS Implants Technologies Ltd. </br>
                    {{__("в Краснодарском крае")}}</p>
            </div>
        </div>

        <div class ="specialist-card-item">
            <div class="specialist_img"><img  src="https://thumb.tildacdn.com/tild3431-6262-4030-a461-613761653931/-/resize/672x/-/format/webp/IMG_5457_3.jpg"></div>
            <div class="specialist_name">
                <h4>{{__("СТОМАТОЛОГ-ОРТОПЕД")}}</h4>
                <p>{{__("Главврач, основатель")}} </br>
                    {{__(" клиники Style Smile")}}</br>
                    {{__("со стажем более 7 лет")}}</p>
            </div>
        </div>

        <div class ="specialist-card-item">
            <div class="specialist_img"><img  src="https://thumb.tildacdn.com/tild6563-3836-4130-b839-303432306366/-/resize/672x/-/format/webp/IMG_5371_3.jpg"></div>
            <div class="specialist_name">
                <h4>{{__("ТЕРАПЕВТ-ЭНДОДОНИСТ")}}</h4>
                <p>{{__("Участница международных ")}} </br>
                    {{__("курсов и конференций,")}}  </br>
                    {{__("посвященных эндодонтии")}} </br>
                    {{__("и ортопедии")}} </p>
            </div>
        </div>

        <div class ="specialist-card-item">
            <div class="specialist_img"><img  src="https://thumb.tildacdn.com/tild3966-3262-4134-b039-366336376164/-/resize/672x/-/format/webp/photo.jpg"></div>
            <div class="specialist_name">
                <h4>{{__("СТОМАТОЛОГ-ОРТОДОНТ")}}</h4>
                <p>{{__("Участница XVII Съезда")}}</br>
                    {{__("ортодонтов России и")}}  </br>
                    {{__("курсов, посвящённых")}} </br>
                    {{__("биомеханике в ортодонтии")}}</p>
            </div>
        </div>
    </div>

    <div class="specialist_btn"><button id ="specialist_btn"  type="button" >
            <a href="https://api.whatsapp.com/send/?phone=79189322020&text&app_absent=0" style="color: white; text-decoration: none ">{{__("Оставить заявку")}}</a></button></div>

    <div class="questions">



    <div class="container">
        <br>
        <h2 align="center">Contact us</h2><br />

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <form  action="{{ route('email-send') }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control"  placeholder="Enter name">

            </div>

            <div class="form-group">
                <label>Surname</label>
                <input name="surname" type="text" class="form-control" placeholder="Enter surname">

            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control"  placeholder="Enter email">

            </div>

            <div class="form-group">

                <label for="email" class="custom-file-lable">Photo</label>
                <input name="image" type="file"  >

            </div>

            <div class="form-group" align="center" >
                <input type="submit" name="send" value="Send"  style="font-size: 20px" class="btn btn-warning">
            </div>

        </form>
        <br>
    </div>
            <!--<div class="questions_text">{{__("ОСТАЛИСЬ ВОПРОСЫ?")}} <t>{{__("СВЯЖИТЕСЬ")}}</t>{{__(" С НАМИ")}}</div>
            <button class ="questions_btn" id="questions_btn" type="button" ><a href="https://api.whatsapp.com/send/?phone=79189322020&text&app_absent=0">{{__("Написать")}}</a></button>
        -->
    </div>

</div>
</div>


<div class="contacts" id="contacts">

    <div class="card">
        <div class="contacts_header"> <h3>{{__("НАШИ ")}} <t>{{__("КОНТАКТЫ")}}</t></h3></div>

        <div class="contacts_text">
            <p>{{__("г. Краснодар, ул. 40-летия Победы, 137 ")}}</p>

            <p>style.smile.dcg@yandex.ru</p>

            <p>+79189322020</p>
        </div>

        <div class="contacts_icon">
            <a href="https://www.instagram.com/style_smile_dcg/"> <img height="45px" src="/img/inst_icon.png"></a>
            <a href="https://api.whatsapp.com/send/?phone=79189322020&text&app_absent=0"><img height="38px"src="/img/wpp_icon.png"></a>
        </div>
    </div>

    <div id="map"> </div>
    <div id="info"></div>

    <div class="podval"></div>

</div>




<script>
    function big(element) {
        element.style.fontSize = "23px";
    }
    function small(element) {
        element.style.fontSize = "22px";
    }

    function load() {
        $(".text").animate({opacity: '1'}, "slow");
        $("#img").animate({opacity: '1'}, "slow");
    }
    //scroll
    $('a').click(function(){
        $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top
        }, 500);
        return false;
    });

    //burger
    const navSlide = () =>{
        const burger = document.querySelector('.burger');
        const nav = document.querySelector('.nav_links');
        const clos = document.querySelector('.cloz');

        burger.addEventListener('click',()=>{
            nav.classList.toggle('nav-active');
        });
        clos.addEventListener('click',()=>{
            nav.classList.toggle('nav-active');
        });

    }
    navSlide();


    //form
  //  function former(){
    //    document.querySelector(".form-at").style.display = "flex";
      //  $(".form-at").animate({opacity: "1"}, "slow");

    //}

    function closed(){
        $(".former").animate({opacity: "0"}, "slow");
        document.querySelector(".form-at").style.display = "none";
    }
    function send(){
        closed();
    }

    (function ($) {
        "use strict";
        var input = $('.validate-input-at .input-at');
        $('#submit-at').on('click',function(){
            var check = true;
            for(var i=0; i<input.length; i++) {
                if(validate(input[i]) == false){
                    showValidate(input[i]);
                    check=false;
                }
            }
            // Отправка формы
            function validate (input) {
                /* Если нужно проверять валидность почты, раскомментируйте строчки ниже */
                /*     if($(input).attr('type') == 'email' || $(input).attr('name') == 'email-at') {
                    if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                    return false;
                    }
                    }
                */
                if($(input).val().trim() == ''){
                    return false;
                }
            }
            function showValidate(input) {
                var thisAlert = $(input).parent();
                $(thisAlert).addClass('alert-validate');
            }
            function hideValidate(input) {
                var thisAlert = $(input).parent();
                $(thisAlert).removeClass('alert-validate');
            }
        });




    })(jQuery);
    //slider
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
    }
    //2
    var slideIndex2 = 1;
    showDivs2(slideIndex2);

    function plusDivs2(n) {
        showDivs2(slideIndex2 += n);
    }

    function showDivs2(n) {
        var i;
        var x = document.getElementsByClassName("mySlides2");
        if (n > x.length) {slideIndex2 = 1}
        if (n < 1) {slideIndex2 = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex2-1].style.display = "block";
    }

    //upbtn
    $('body').append('<div class="upbtn"></div>');
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1000) {
            $('.upbtn').css({
                transform: 'scale(1)'
            });
        } else {
            $('.upbtn').css({
                transform: 'scale(0)'
            });
        }
    });
    $('.upbtn').on('click',function() {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
        return false;
    });

    ///ceny
    $(function() {
        $('.acc_ctrl').on('click', function(e) {
            e.preventDefault();
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(this).next()
                    .stop()
                    .slideUp(300);
            } else {
                $(this).addClass('active');
                $(this).next()
                    .stop()
                    .slideDown(300);
            }
        });
    });




    //map
    var map;

    DG.then(function () {
        map = DG.map('map', {
            center: [45.056276, 39.030674], // Координаты центра карты
            zoom: 16, //
            scrollWheelZoom: false // Запрет прокрутки карты колесом мыши
        });


        mapicon = DG.icon({
            iconUrl: '/img/tooth-icon.png', //Иконка маркера
            iconAnchor: [32, 64],
            popupAnchor: [0, 24],
            className: 'map-icon',
            iconSize: [50, 50] // Размер иконки
        });
        DG.marker([45.056555, 39.036072], {icon: mapicon}).addTo(map).bindPopup('<div class="map-popup"><h2>Style Smile</h2><br/>dental clinic</div>');     //Координаты маркера и текст попапа


    });

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>

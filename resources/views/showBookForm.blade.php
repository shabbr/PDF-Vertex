<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');




        .maindiv {
            display: flex;
            margin-top: 50px;



        }

        .toggle-button {
            cursor: pointer;
            color: gray;
            display: flex;
            align-items: center;
            font-style: italic;
        }

        .toggle-button1 {
            cursor: pointer;
            color: gray;
            display: flex;
            align-items: center;
            font-style: italic;
        }

        .toggle-button2 {
            cursor: pointer;
            color: gray;
            display: flex;
            align-items: center;
            font-style: italic;
        }

        .toggle-button3 {
            cursor: pointer;
            color: gray;
            display: flex;
            align-items: center;
            font-style: italic;
        }

        .line {
            border-top: 1px solid #ccc;
            flex-grow: 1;
            margin-right: 5px;
        }

        .arrow {
            transition: transform 0.3s;
        }

        .arrow.down {
            transform: rotate(-90deg);
        }

        .toggle-content .input {
            margin-top: 12px;
            border: 1px solid #ffa500;
        }

        .inputs {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .input-title input,
        .input-date input,
        .input-medium input,
        .input-galary input,
        .input-loc input,
        .input-date input[type="date"],
        .is-online input {
            width: 100%;
        }

        .input-form .form .input-wrappers .inputs .textdiv {
            text-align: right;
            padding-right: 15px;
            width: 30%;
            text-decoration-line: underline;
            text-decoration-style: dashed;
            text-decoration-color: gray;
            text-underline-offset: 2px;
        }

        .input-form .form .input-wrappers .inputs input {
            width: 50%;
            border: 1px solid #ffa500;
        }



        .btns {
            position: relative;
            left: 27px;
            top: 41px;
            width: 15%;
            border: none;
            background-color: #CCD0D6;
            border-radius: 30px;
        }

        .previwdiv {
            margin-top: 40px;
            /* width: 116%; */
            height: 90px;
            background-color: #E3E8EE;
        }

        /* zigzag preview */
        .zigzag {
            position: relative;
        }

        .zigzag::before {
            content: "";
            position: absolute;
            left: 0;
            width: 100%;
            height: 30px;
            background: linear-gradient(135deg, #fff 12px, transparent 0%),
                linear-gradient(-135deg, #fff 12px, transparent 0%);
            background-size: 30px;
        }

        .zigzag::before {
            top: 0;
        }

        /* ---------- */
        .input-wrappers .textheader {
            width: 18%;
            text-decoration-line: underline;
            text-decoration-style: dashed;
            text-decoration-color: gray;
            text-underline-offset: 2px;
        }

        .titleform {
            display: block;
            font-size: 30px;
            margin-bottom: 10px;
            font-family: sans-serif;
        }

        * {
            box-sizing: border-box;
            font-family: "Roboto", sans-serif;
        }

        :root {

            /* for light mode */
            --bg-main: #e3e8ee;
            --bg-secondary: rgb(250, 250, 250);
            --clr-icons: rgb(68, 67, 67);
            --clr-hover-icons: rgb(29, 29, 29);
            --text-light: rgb(255, 255, 255);
            --text-dark: rgb(33, 33, 33);
            --filter-svg: brightness(1) invert(0);


            /* for response color grading */
            /* for light mode  */
            --bg-li-gr-1: rgb(255, 255, 255);
            --bg-li-gr-2: rgb(13, 110, 253);

            /* for dark mode */
            /* --bg-li-gr-1:rgb(52, 52, 52);
    --bg-li-gr-2:rgb(66, 56, 56); */

            /* for dark mode */
            /* --bg-main:rgb(23, 23, 23);
    --bg-secondary:rgb(39, 38, 38);
    --clr-hover-icons:rgb(220, 217, 217);
    --text-light:rgb(43, 42, 42);
    --text-dark:rgb(238, 238, 238); */
        }

        body {
            margin: 0;
            background-color: var(--bg-main);
            font-family: serif;
        }

        img {
            user-select: none;
        }

        /* width */
        ::-webkit-scrollbar {
            width: 8px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px rgba(128, 128, 128, 0);
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #2a3c4ea2;
            border-radius: 10px;
        }

        main {
            display: flex;
            /* position: relative; */
        }

        .btn {
            border-radius: 0;
        }

        .navbar {
            background: var(--text-light);
            width: 100%;
            padding: 0px 15px;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        /* .sidebar */
        .logo-head .logo {
            width: 38px;
        }


        .sidebar {
            width: 250px;
            height: 100%;
            padding: 5px 2px;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-direction: column;
            position: relative;
            position: fixed;
            transition: all 1s;
            background-color: var(--bg-main);
            z-index: 100;
        }


        @media screen and (max-width:1037px) {
            .main-section .main-main .main-center {
                margin-left: 250px;
            }

            .contact-dialog {
                margin-left: 240px;
            }

            .main-main .main-center-side-icon {
                margin-left: 5px;
            }

            .sidebar {
                transition: all .4s;

                left: -153px;

            }

            .sidebar:hover {
                left: 0px;
            }
        }

        @media screen and (max-width:600px) {
            .main-section .main-main .main-center {
                margin-left: 500px;
            }

        }

        /* .sidebar  */
        .logo-head {
            /* width: 100%; */
            display: flex;
            align-items: center;
            background-color: var(--text-light);
            /* border-top-right-radius: 50px;
    border-bottom-right-radius: 50px; */
            /* position: relative; */
            height: 55px;
            cursor: pointer;
            gap: 10px;

        }

        /* .sidebar  */
        .logo-head p {
            margin-block: auto;
            font-size: 20px;
            color: var(--text-dark);
            margin-left: 50px;
            user-select: none;
        }



        /* .sidebar */
        .logo-head .logo {
            width: 100px;
        }

        /* .sidebar */
        .logo-head .light-icon {
            /* right: 20px;
    position: absolute; */
            width: 24px;
            fill: var(--clr-icons);
        }

        /* .sidebar */
        .logo-head .light-icon:hover {


            transition: all .4s;
            fill: var(--clr-hover-icons);
        }

        /* .sidebar  */
        .logo-head svg {
            width: 20px;
            /* position: absolute; */
            /* right: 20px; */
            fill: var(--clr-icons);
        }

        /* .sidebar */
        .logo-head svg:hover {

            fill: var(--clr-hover-icons);
        }

        .hide-icon {
            display: none;
        }

        .sidebar .start-project {
            width: 97%;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            padding: 10px;
            margin-top: 15px;
        }

        .sidebar .start-project svg {
            width: 28px;
            fill: var(--text-dark);
        }

        .sidebar .start-project p {
            display: inline;
            font-size: 15px;
            margin-block: auto;
            margin-left: 5px;
            user-select: none;
            color: var(--text-dark);
        }

        .sidebar .start-project:hover {
            background-color: #405c783b;
            transition: all .3s;
            cursor: pointer;
        }

        /* .sidebar */
        .sidebar-bottom {
            /* position: absolute; */

            /* border: 1px solid rgba(128, 128, 128, 0.374); */
            /* width: 97%;
    bottom: 10px; */
            /* border-top-right-radius: 50px;
    border-bottom-right-radius: 50px; */
            padding: 10px 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 35px;
            opacity: 0.6;
        }

        /* .sidebar  */
        .sidebar-bottom:hover {
            /* border: 1px solid grey; */
            transition: all .3s;
            cursor: pointer;
            opacity: 1;
        }

        /* .sidebar */
        .sidebar-bottom:hover>svg {
            fill: var(--clr-hover-icons);
        }

        /* .sidebar */
        .sidebar-bottom svg {
            width: 20px;
            height: 20px;
            fill: var(--clr-icons);

        }

        .sidebar .sidebar-center {
            max-height: 450px;
            width: 100%;
            overflow: auto;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 8px;
            flex-direction: column;
        }

        .sidebar .new-project {
            background-color: var(--bg-secondary);
            width: 100%;
            display: flex;
            /* justify-content: space-around; */
            justify-content: space-between;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            padding: 5px 10px;
            border-left: 4px solid purple;
            /* change */
            color: var(--text-dark);
        }

        .sidebar .new-project a img {
            width: 30px;
            float: right;
        }

        .sidebar .new-project p {
            margin-block: auto;
            font-size: 15px;
            color: var(--text-dark);
        }

        /* add change */
        .sidebar .new-project #optionsDropdown {
            opacity: 0;
        }

        .sidebar .new-project:hover #optionsDropdown {
            opacity: 1;
        }

        .delete-and-archive {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            width: 97%;

            border: 1px solid grey;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            opacity: 0.6;


        }

        .delete-and-archive:hover {
            opacity: 1;
        }

        .delete-and-archive div {
            width: 50%;
            text-align: center;
            padding: 7px;
            cursor: pointer;

        }

        .delete-and-archive div:nth-child(1) {
            border-right: 1px solid grey;
        }

        .delete-and-archive svg {
            width: 29px;

            fill: grey;
        }

        .delete-and-archive div:hover>svg {
            fill: var(--clr-hover-icons);
        }

        /* side bar ends */
        /* main sec */
        .main-section {
            width: calc(100vw - 250px);
            margin-left: 250px;
        }

        .main-section .main-main {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: start;
        }

        .main-section .main-main .main-center {
            width: 870px;
            padding: 0px 0px;
            position: relative;
            display: flex;
            justify-content: center;
        }

        .main-section .main-main .main-center .main-head {
            margin-top: 0;
            position: fixed;
            z-index: 1;
            background-color: var(--bg-main);
            width: 850px;
            display: flex;
            justify-content: space-between;
            padding: 15px 0px;
            padding-top: 34px;
        }

        .main-section .main-main .main-center .add-citation {
            border: 0;
            outline: 0;
            padding: 5px 15px;
            color: var(--text-light);
            background-color: #34a853;
            font-size: 15px;
            color: white;
        }

        .main-section .main-main .main-center .add-citation img {
            width: 16px;
            margin-block: auto;
            margin-right: 5px;
            fill: var(--clr-icons);

        }

        .main-section .main-main .main-center .add-citation:hover {
            background-color: rgb(52, 168, 83, 0.7);
        }

        .main-section .main-main .main-center .import {
            border: 0;
            background-color: transparent;
            padding: 3px 10px 5px 10px;
            color: var(--text-dark);
            font-size: 15px;
            border: 1px solid grey;
            margin-left: -5px;
            border-left-color: transparent;
        }

        .main-section .main-main .main-center .import img {
            width: 18px;
            margin-block: auto;
            margin-right: 3px;
            filter: var(--filter-svg);
        }

        .main-section .main-main .main-center .right-arrow {
            fill: var(--text-dark);
            width: 40px;
            height: 40px;
            margin-left: 20px;
            border-radius: 50px;
            padding: 5px;
            fill: var(--text-dark);
            filter: var(--filter-svg);
            border: 2px solid grey !important;

        }

        .main-section .main-main .main-center .select-style {
            background-color: transparent !important;
            width: 200px;
            display: inline;
            margin-left: 20px;
            border: 1px solid grey;
            color: var(--text-dark);
        }

        #styles-dialog {
            position: relative;
            width: 600px;
            border: 1px solid grey;
            outline: 0;
            padding: 20px;

        }

        #styles-dialog div {
            margin: 20px 0px;
        }

        #styles-dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.356);
        }

        #styles-dialog .close-styles-modal {
            position: absolute;
            right: 15px;
            top: 15px;
            width: 35px;
            padding: 10px;
            border-radius: 50px;
        }

        #styles-dialog .close-styles-modal:hover {
            background-color: rgba(0, 0, 0, 0.137);
        }

        .main-section .main-main .main-center .download {
            margin-left: 10px;
            font-size: 14px;
        }

        .main-section .main-main .main-center .download img {
            width: 20px;
        }

        .main-section .main-main .main-page {
            height: 1000px;
            background-color: var(--bg-secondary);
            margin-top: 100px;
            /* z-index: -1; */
            margin-bottom: 50px;
            /* position: relative; */
            width: 850px;
            /* width: 97%; */
        }

        /* main page */
        .main-page .page-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .main-page .page-head p {
            font-size: 14px;
            padding: 10px;
            color: var(--clr-hover-icons);
            cursor: pointer;

        }

        .main-page .page-head p:hover {
            color: var(--text-dark);
            cursor: pointer;

        }

        .main-page .form-check {
            position: relative;
            top: 50px;
            left: 100px;
            font-size: 20px;
        }

        .main-page .form-check input {
            background-color: var(--bg-secondary);
            border: 1px solid grey;
            cursor: pointer;
        }

        .main-page .form-check label {
            font-size: 20px;
            color: var(--text-dark);

        }

        .main-page .main-content {
            /* border: 1px solid red; */

            position: relative;

            top: 250px;
            text-align: center;
            color: var(--text-dark);
        }


        .main-page .main-content p {
            font-size: 15px;
            /* color: var(--clr-icons); */
            color: var(--text-dark);

        }



        /* citation modal */

        #citation-modal {
            width: 750px;
            border: 1px solid black;
            /* position: relative; */

        }

        .close-modal {
            width: 36px;
            position: absolute;
            top: 14px;
            right: 14px;
            padding: 10px;
            border-radius: 50px;
        }

        .close-modal:hover {
            background-color: rgba(0, 0, 0, 0.194);
            cursor: pointer;
        }

        ::backdrop {
            background: rgba(0, 0, 0, 0.502);
        }


        /* more option */
        .bar .options {
            width: 30%;
            text-align: start;
            padding: 5px;
            font-size: 15px;
            font-style: san-serif;
        }

        .bar .options:hover {
            cursor: pointer;
            background-color: rgba(128, 128, 128, 0.21);
            transition: all .3s;
            border-radius: 5px;
        }

        .bar-options {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 10px;
            flex-wrap: wrap;
        }

        .bar {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .bar .input {
            border: 1;
            outline: 0;
            width: 80%;
            height: 40px;
            padding: 10px;
            margin-block: auto;
            font-size: 15px;

        }

        .bar button {
            width: 20%;
            color: var(--text-light);
            border: 1;
            outline: 0;
            height: 40px;
            margin-block: auto;
            color: white;
        }

        .bar button img {
            width: 17px;
        }

        .drag-drop {
            padding: 20px;
            font-size: 16px;
            border: 6px dashed rgba(196, 196, 196, 0.995);
        }

        /* import slide */
        main .import-slide {
            position: absolute;
            background-color: white;
            box-shadow: 50px 50px 200px grey;
            bottom: -100vh;
            right: 0;
            left: 0;
            height: 300px;
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            gap: 20px;
            transition: all .2s;

        }

        main .import-slide .close-btn {

            width: 36px;
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px;
            border-radius: 50px;
        }

        main .import-slide h2 {
            position: absolute;
            top: 20px;
            left: 47%;
            font-size: 25px;
        }

        main .import-slide .close-btn:hover {
            background-color: rgba(0, 0, 0, 0.194);
            cursor: pointer;
        }

        main .import-slide .import-card img {
            width: 30px;

        }

        main .import-slide .import-card {

            padding: 30px 20px;

            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            position: relative;
            width: 150px;
        }

        main .import-slide .import-card input {
            font-size: 10px;
            position: absolute;
            bottom: -30px;
            left: 0;
        }

        main .import-slide .import-card {
            border: 1px solid grey;
        }




        .input-form {
            position: absolute;
            inset: 0;
            padding: 10px;
            background-color: rgb(255, 255, 255);
            display: none;
            transition: all .4s;


        }

        .input-form .form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 10px;
            background-color: rgb(255, 255, 255);
            padding: 5px 40px;
            position: relative;


        }

        .input-form .back-form {
            width: 40px;
            position: absolute;
            left: 20px;
            top: 20px;
            padding: 10px;
            border-radius: 50px;
            z-index: 1;
        }

        .input-form .back-form:hover {
            background-color: rgba(0, 0, 0, 0.157);
            transition: all .4s;
            cursor: pointer;
        }

        .input-form .form .input-wrappers {
            /* border: 1px solid red; */
            display: flex;
            gap: 20px;
            width: 100%;
            justify-content: center;
            align-items: center;

        }

        .input-form .form .input-wrappers>p {
            margin-block: auto;
            font-size: 14px;
        }

        .input-form .form .input-wrappers .inputs {
            display: flex;
            margin-top: 12px;
            justify-content: center;
            align-items: center;
            width: 80%;

        }

        .input-form .form .input-wrappers .inputs input {
            /* border: 1px solid rgb(29, 189, 203); */
            padding: 7px;
            width: 100%;
            height: 100%;
            border: 0;
            outline: 0;
            border-radius: 5px;
            margin-inline: 1px;
            border: 1px solid gray;

        }

        .input-form .form .input-wrappers:first-child .inputs input {
            border: 1px solid #ffa500;

        }

        .input-form .form .input-wrappers .inputs input:focus {
            border: 1px solid rgb(0, 145, 255);
        }

        .input-form .form .save-citation-form {
            margin: 20px auto;
            display: block;
        }

        .input-form .form .input-wrappers .inputs div button {
            border-radius: 2px;
            background: #E3E8EE;
            border: none;
            padding: 6px;
            margin: 0% 2px;
        }

        .input-form .form .input-wrappers .inputs div button:hover {
            background: #9b9ea1;
        }

        .hrs {
            border: 1px solid black;
        }

        textarea {
            resize: none;
            border: 1px solid gray;
        }

        .artist input {
            border: 1px solid #ffa500;
            padding: 5px;
            border-radius: 5px;
        }

        .artist input:focus {
            outline: none;
            border: 1px solid rgb(0, 145, 255);
        }

        .artist div button {
            background: #E3E8EE;
            border: none;
            padding: 6px;
            margin: 0 2px;
            border-radius: 2px;
        }

        .artist div button:hover {
            background: #9b9ea1;
        }

        .artist span {
            text-decoration-line: underline;
            text-decoration-style: dashed;
            text-decoration-color: gray;
            text-underline-offset: 2px;
            font-weight: normal;
        }

        /* ------------------ */
        .vertical-icons {
            /* margin-top: 20px; */
            /* position: fixed; */
            /* top: 0;
    right: 0; */
            /* background-color: var(--text-light); */
            /* padding: 10px; */
            /* border-radius: 12px 0px 0px 20px; */
            display: flex;
            align-items: center;
            gap: 10px;
        }



        .vertical-icons a img,
        .language a img {
            width: 25px;
            height: 25px;
            vertical-align: middle;


            /* Align icons vertically */
        }

        .vertical-icons a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            /* Change background color on hover */
        }

        /* vertical language icon */
        .language {
            position: fixed;
            bottom: 0;
            right: 0%;
            margin-bottom: 20px;
            background-color: var(--text-light);
            padding: 10px;
            border-radius: 20px 0px 0px 20px;
        }

        .filtericon {
            filter: var(--filter-svg);
        }



        .dropdown-menu {
            display: none;
            left: 90%;
            width: 100%;
            text-align: center;
            font-family: serif;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 15px;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }

        .dropdown-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .dropdown-menu ul li {
            padding: 6px 15px;
            display: flex;
            text-align: center;


        }

        .dropdown-menu ul li img {
            width: 20px;
            height: auto;
        }

        .dropdown-menu ul li a {
            text-decoration: none;
            color: black;
            padding-left: 12px;
            font-size: 16px;
        }

        .dropdown-menu ul li:hover {
            background-color: #f0f0f0;
        }


        .projectdiv {
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: space-around;
            border: none;
        }

        .project {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        .showresponseContainer {
            width: 100%;
            height: auto;
            position: relative;
            top: 6%;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .showresponseContainer .row {
            margin-bottom: 10px;
            width: 90%;
            margin: 0 auto;
            z-index: 1;
            padding: 15px;
        }

        .container-span {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        span img {
            width: 30px;
            padding-left: 12px;
            height: auto;
        }

        .container-span input[type="checkbox"] {
            margin-right: 10px;

        }

        .container-span a {
            margin-left: 10px;
            text-decoration: none;
            color: blue;
        }

        .editable {
            width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-left: 1px;
            border: none;
            color: var(--text-dark);
            background: transparent;
        }

        .editable:focus-visible {
            outline: none;
            text-overflow: clip;
            font-style: italic;
        }



        /* login */
        #login-menu {
            position: fixed;
            z-index: 90;
            cursor: pointer;

        }

        #login-menu ul {
            position: absolute;
            width: auto;
            text-align: start;

        }

        #login-menu ul hr {
            margin: 0;
            padding: 0%;

        }

        #login-menu ul li a {
            padding: 4px 0px 4px 5px;
            margin: 0;
        }

        #login-menu ul li a img {
            margin-right: 10px;
        }

        #login-menu ul li a:hover {
            cursor: pointer;
            background-color: rgba(147, 136, 136, 0.598);
        }

        #login-menu ul li a span {
            color: black;

        }


        /* responses styles */
        .responses .response {
            display: flex;
            justify-content: start;
            align-items: center;
            width: 100%;
            padding: 0 20px 0 50px;
            background: var(--bg-secondary);
            color: var(--text-dark);
            cursor: zoom-in;

        }

        .responses .response input {
            width: 20px;
            height: 20px;
            border-radius: 5px;
            cursor: pointer;
            border: 1px solid gray;
            opacity: 0;
            background-color: var(--text-light);


        }

        .responses .response input[type="checkbox"]:checked {
            accent-color: #0d6efd;
        }

        .responses .response .response-icons {
            display: flex;
            justify-content: space-around;
            align-items: center;
            position: absolute;
            right: 20px;
            background: var(--text-light);
            border-radius: 25px;
            padding: 5px 15px;
            opacity: 0;
        }

        .responses .response .response-icons button {
            border: none;
            background: none;
        }

        .responses .response .response-icons a svg {
            width: 24px;
            height: 24px;
        }

        .responses .response .response-icons button svg {
            fill: var(--text-dark);
            width: 24px;
            height: 24px;
        }

        .responses .response:hover .response-icons,
        .responses .response:hover div input {
            opacity: 1;
        }

        /* ----------------- */
        .main-main .main-center-side-icon {
            position: sticky;
            top: 151px;
            left: 6px;
            display: flex;
            gap: 8px;
        }

        .main-main .main-center-side-icon .side-icon {
            opacity: .3;
        }

        .main-main .main-center-side-icon .side-icon:hover {
            opacity: 1;
        }

        .main-main .main-center-side-icon div svg {
            width: 30px;
            height: 30px;
            filter: var(--filter-svg);
        }

        .main-main .main-center-side-icon .main-side .main-side-1 {
            display: flex;
            position: absolute;
            justify-content: center;
            align-items: center;
            grid-area: 4px;
            width: 854px;
            right: 70px;
            border: 1px solid transparent;
            opacity: 1;
            display: none;
            /* background: var(--text-light); */

        }


        .main-main .main-center-side-icon .main-side .main-side-1 button {
            padding: 10px;
            background: var(--bg-main);
            border: none;

        }

        .main-main .main-center-side-icon .main-side .main-side-1 input {
            width: 820px;
            padding: 10px;
            border: none;
            border-radius: 2px;
            background: var(--bg-main);
            color: var(--text-dark);
            outline: none;

        }

        .dropdown-menu li span {
            padding-left: 20px;
        }

        /* ------message - support - dialog------ */
        .contact-dialog {
            margin: auto;
            min-width: 500px;
            width: 800px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.8);
            background: white;
            text-align: center;
            border-radius: 5px;
            border: none;
        }

        .contact-dialog h1 {
            font-size: 20px;
            font-weight: normal;

        }

        /* .contact-dialog .dialog-head button{
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    outline: none;
    padding: 12px;

}
.contact-dialog .dialog-head button:hover{
    cursor: pointer;
    background: rgba(109, 106, 106, 0.409);
    border-radius: 25px;
} */
        .contact-dialog .dialog-head {
            margin: 20px auto;
        }

        .contact-dialog .dialog-body div {
            padding: 10px 50px;
        }

        .contact-dialog .dialog-body p {
            text-align: start;
            font-weight: bold;
            padding: 10px 40px;
        }

        .contact-dialog .dialog-body .body1 div {
            width: 100%;
            height: 80px;
            border: 1px solid gray;
            padding: 10px;
            margin: 20px 0px;
            display: flex;
            justify-content: start;
            align-items: center;
        }

        .contact-dialog .dialog-body .body1 div:hover {
            cursor: pointer;
            border: 1px solid #4285F4;
            background: #BDBDBD;
        }

        .contact-dialog .dialog-body .body1 div img,
        .contact-dialog .dialog-body .body1 div svg {
            width: 45px;
            height: 45px;
            padding: 10px;
        }

        .contact-dialog .dialog-body-1 p {
            padding: 10px 50px;
        }

        .contact-dialog .dialog-body-1 span {
            font-weight: bold;

        }

        .dialog-body-2 form {
            padding-left: 50px;
        }

        .dialog-body-2 form div input,
        .dialog-body-2 form div textarea {
            width: 300px;
            padding: 6px;
            outline: 1px solid gray;
            border: none;
            border-radius: 3px;
        }

        .dialog-body-2 form div textarea {
            width: 400px;
        }

        .dialog-body-2 form div input:focus,
        .dialog-body-2 form div textarea:focus {
            outline: 1px solid rgba(0, 0, 255, 0.852);
        }

        .dialog-body-2 form div label {
            text-align: right;
            width: 150px;
            padding: 10px;
        }

        .dialog-body-2 form div {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }

        .dialog-body-2 .send {
            width: 100px;
            border: none;
            border-radius: 2px;
        }

        .dialog-body-2 .send:hover {
            background: #4285F4;
            color: white;
        }

        .dialog-body-1,
        .dialog-body-2 {
            display: none;
        }

        /* ---------------share-dialog------------- */
        .share-dialog {
            margin: auto;
            width: 700px;

            border: none;
            outline: none;
        }

        .share-dialog .share-head h1 {
            font-size: 20px;
            font-weight: normal;
        }

        .share-dialog .share-head {
            /* width: 100%; */
            margin: 20px auto;
            text-align: center;


        }

        /* .share-dialog .share-head button{
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    outline: none;
    padding: 10px;

}
.share-dialog .share-head button:hover{
    cursor: pointer;
    background: #BDBDBD;
    border-radius: 25px;
} */
        .share-dialog .share-body {
            font-weight: bold;
        }

        .share-dialog .share-body .share-email {
            display: none;
        }

        .share-dialog .share-body div input {
            border: 1px solid #BDBDBD;
            outline: none;
        }

        .share-dialog .share-body div input:focus {
            border: none;
            outline: 1px solid #0d6efd;
        }

        /* cross dialog button of msg - share - archive - remove */
        .dialog-cross {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            outline: none;
            padding: 7px 10px;

        }

        .dialog-cross:hover {
            cursor: pointer;
            background: #BDBDBD;
            border-radius: 25px;
        }

        /* -------------archive dialog -------------*/
        .archive-dialog {
            z-index: 1000;
            text-align: center;
            min-width: 500px;
            max-width: 800px;
            width: 100%;
            margin: auto;
            border: none;
            outline: none;
        }

        .archive-dialog-body .arc-body-image {
            mask-image: radial-gradient(circle at 50% 50%, rgb(255, 255, 255) 60%, rgba(255, 255, 0, 0) 75%);
        }

        .archive-dialog-body-1 .projects {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .archive-dialog-body-1 .projects .project {
            display: flex;
            align-items: center;
            cursor: pointer;
            width: 240px;
            background: white;
            border-left: 4px solid purple;
            box-shadow: 0 0 10px 1px rgb(209, 203, 203);
            border-radius: 0 20px 20px 0;
        }

        .archive-dialog-body-1 .projects .project p {
            margin: 10px;
            padding: 0;
        }

        .archive-dialog-body-1 .projects button {
            cursor: pointer;
        }

        .archive-dialog-body-1 .projects .delete-btn {
            box-shadow: 0px 0 10px rgba(0, 0, 0, 0.274);
            background-color: white;
        }

        /* ----------- */
        .date-of-del {
            text-align: left;
            background: #9b9ea1;
            padding: 2px;
            width: 100%;
        }

        .delete-dialog-body-1 .projects {
            display: flex;
            flex-direction: column;
        }

        .delete-dialog-body-1 .projects input {
            width: 19px;
            accent-color: #0d6efd;
        }

        .delete-dialog-body-1 .projects .project {
            display: flex;
            align-items: center;
            cursor: pointer;
            width: 240px;
            background: white;
            border-left: 4px solid purple;
            box-shadow: 0 0 10px 1px rgb(209, 203, 203);
            border-radius: 0 20px 20px 0;
        }

        .delete-dialog-body-1 .projects .project p {
            margin: 10px;
            padding: 0;
        }

        .delete-dialog-body-1 .projects button {
            cursor: pointer;
        }

        .delete-dialog-body-1 .projects .delete-btn {
            box-shadow: 0px 0 10px rgba(0, 0, 0, 0.274);
            background-color: white;
        }

        .delete-dialog-body-1 .del-cites .cite {
            display: flex;
            align-items: center;

        }

        .delete-dialog-body-1 .del-cites .cite input {
            width: 24px;
            height: 24px;
            accent-color: #0d6efd;
        }

        .delete-dialog-body-1 .del-cites .cite span {
            color: #BDBDBD;
        }

        /* user-dialog */
        .user-dialog {
            transform: translate(-47px, 37px);
            margin: 5px 100px 0 auto;
            border: none;
            padding: 0%;
            border-radius: 5px;
            min-width: 100px;
            min-height: 80px;


        }

        .user-dialog div {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: start;
        }

        .user-dialog a {
            text-decoration: none;
            color: black;
            padding: 5px;
            margin: 0;
            width: 100%;
            margin: 5px 0px;
        }

        .user-dialog a:hover {
            background: #BDBDBD;
        }

        .user-dialog hr {
            margin: 0;
            width: 100%;
        }

        /* ----------notifiDialog-------- */
        .notifi-dialog {
            transform: translate(-47px, 87px);
            max-width: 600px;
            min-width: 400px;
            width: 100%;
            max-height: 500px;
            margin: 0 0 0 auto;
            background: #e3e8ee;
            border: none;
            padding: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.536);
            overflow-y: auto;
        }

        .notifi-dialog .notifi-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 16px;
            position: sticky;
            top: 0%;
        }

        .notifi-dialog .notifi-head button {
            border: none;
            outline: none;
            background: transparent;
            padding: 7px 10px;
        }

        .notifi-dialog .notifi-head button:hover {
            cursor: pointer;
            background: #BDBDBD;
            border-radius: 25px;
        }

        .notifi-dialog .notifi-content {
            margin: 15px;
            cursor: pointer;
        }

        .notifi-dialog .notifi-content a {
            text-decoration: none;
            color: black;

        }

        .notifi-dialog .notifi-content .notification {
            padding: 10px;
            margin-bottom: 10px;
            background: white;
        }

        .notifi-dialog .notifi-content .notification .feature {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 10px;
        }

        .notifi-dialog .notifi-content .notification .feature span {
            color: #BDBDBD;
        }

        .notifi-dialog .notifi-content .notification .feature p {
            color: white;
            background: #0d6efd;
            padding: 0 8px;
            border-radius: 25px;
            margin: 0%;
        }

        .notifi-dialog .notifi-content .notification .notifi-inner-link {
            color: #4285F4;
        }

        /* lang-dialog */
        .lang-dialog {
            margin: auto 0px 20px auto;
            border: none;
        }

        .lang-dialog input {
            width: 20px;
            height: 20px;
            vertical-align: middle;
            accent-color: blue;
        }

        .lang-dialog hr {
            margin: 0;
        }



        .searchDataCite {
            display: none;
        }

        .searchDataCite ul {

            padding-left: 0%;
        }

        .searchDataCite ul li {
            margin: 5px auto;
        }

        #httpErr {
            display: none;
            background: rgb(242, 222, 222);
            color: rgb(169, 68, 66);
            padding: 10px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="input-form" style="display: block; width: 750px; margin: auto;">
        <img src="images/back-svgrepo-com.svg" class="back-form" alt="">
        <div id="headertitle" class="titleform"></div>


        <div class="form">
            <!-- Website form32 -->
            {{-- <form action="" class="cite-form" id="form32"> --}}
                <form action="{{route('submitBookForm')}}" method="post" class="cite-form" id="form7">
                   @csrf
                <input type="hidden" name='projectId' value="{{ $projectId }}">
                   
                    <div class="container mt-5 BOOKAUTHOR header" id="header7">
                      <div class="toggle-container">
                        <span class="toggle-button" data-toggle="collapse" href="#toggleContent2"
                          >Contribution<span class="line"></span
                          ><span class="arrow">&#x2039;</span></span
                        >
                        <div class="collapse show" id="toggleContent2">
                          <div class="toggle-content">
                            <div class="BOOKAUTHOR">
                              <div class="input-wrappers">
                                <div class="textheader">BOOK AUTHOR</div>
                                <div class="inputs">
                                  <input type="text" placeholder="First Name" name='firstName' value="{{$firstName}}" /><input
                                    type="text"
                                    placeholder="Last Name" name="lastName" value="{{$lastName}}"
                                  />
                                  <div class="d-flex">


                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="container mt-5 BOOK1 body" id="body7">
                      <div class="toggle-container">
                        <span class="toggle-button1" data-toggle="collapse" href="#toggleContent2"
                          >Book<span class="line"></span
                          ><span class="arrow1">&#x2039;</span></span
                        >
                        <div class="collapse show" id="toggleContent2">
                          <div class="toggle-content">
                            <div class="input-wrappers">
                              <div class="input-title inputs">
                                <div class="textdiv">Title of Book</div>
                                <input type="text" name='title' value="{{$title}}" />
                              </div>
                            </div>
                            <div class="input-wrappers">
                                <div class="input-title inputs">
                                  <div class="textdiv">Publisher</div>
                                  <input type="text" name='publisher' value="{{$publisher}}" />
                                </div>
                              </div>
                            <div class="input-wrappers">
                              <div class="input-date inputs">
                                <div class="textdiv">DATE PUBLISHED:</div>
                                <input type="date" name='publishedDate' />
                              </div>
                            </div>

                            <div class="input-wrappers">
                              <div class="input-medium inputs">
                                <div class="textdiv">Page Range</div>
                                <input type="text" name='range' />
                              </div>
                            </div>
                            <div class="input-wrappers">
                              <div class="input-galary inputs">
                                <div class="textdiv">ISBN</div>
                                <input type="text" name='isbn' value="{{$isbn}}" />
                              </div>
                            </div>
                            <div class="container mt-5">
                              <div class="toggle-container">
                                <span
                                  class="toggle-button3"
                                  data-toggle="collapse"
                                  href="#toggleContent4"
                                  >BOOK IS ONLINE?<span class="line"></span
                                  ><span class="arrow3">&#x2039;</span></span
                                >
                                <div class="collapse show" id="toggleContent4">
                                  <div class="toggle-content">
                                    <div class="input-wrappers">
                                      <div class="input-title inputs">
                                        <div class="textdiv">URL:</div>
                                        <input type="text" name='url' />
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="container mt-5 annotation footer" id="globalFooter">
                      <div class="toggle-container">
                        <span class="toggle-button2" data-toggle="collapse" href="#toggleContent3"
                          >ANNOTATION<span class="line"></span
                          ><span class="arrow2">&#x2039;</span></span
                        >
                        <div class="collapse show" id="toggleContent3">
                          <div class="toggle-content">
                            <div class="input-wrappers ">
                              <div class="input-loc inputs">
                                <div class="textdiv">MUSEUM OR GALLERY LOCATION</div>
                                <textarea name="location" rows="3" cols="70" id="text-area"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="previwdiv zigzag">
                      <div>
                         <div  class="btns">PREVIEW</div>
                          <div id="preview1" style="float: left; margin-left: 150px;"></div>
                      </div>
                    </div>
                    <button style="border-radius: 12px;" id="btnform" type="submit"
                    class="flex btn btn-primary save-citation-form w-100">
                    <span style="font-size: 20px;" class="w-100">&#10003;&nbsp;</span>Save
                </button>
                  </form>





            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
</body>

</html>

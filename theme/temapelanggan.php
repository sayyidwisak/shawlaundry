<style>
    @media screen and (max-width: 992px) {
        .all {
            padding: 1em;
        }
    }

    .focus-in-contract {
        -webkit-animation: focus-in-contract 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: focus-in-contract 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }

    /* ----------------------------------------------
 * Generated by Animista on 2022-12-10 3:7:0
 * Licensed under FreeBSD License.
 * See http://animista.net/license for more info. 
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

    /**
 * ----------------------------------------
 * animation focus-in-contract
 * ----------------------------------------
 */
    @-webkit-keyframes focus-in-contract {
        0% {
            letter-spacing: 1em;
            -webkit-filter: blur(12px);
            filter: blur(12px);
            opacity: 0;
        }

        100% {
            -webkit-filter: blur(0px);
            filter: blur(0px);
            opacity: 1;
        }
    }

    @keyframes focus-in-contract {
        0% {
            letter-spacing: 1em;
            -webkit-filter: blur(12px);
            filter: blur(12px);
            opacity: 0;
        }

        100% {
            -webkit-filter: blur(0px);
            filter: blur(0px);
            opacity: 1;
        }
    }

    /* .input-group-text,
    input[type="email"],
    input[type="password"] {
        font-size: 11px;
    } */

    /*nav img .logo {width: 10px;}*/
    /* .judul {
        font-size: 20px;
    } */



    .container,
    h4,
    p,
    h5 {
        color: black;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    html {
        scroll-behavior: smooth;
    }


    .akun {
        font-size: 14px;
    }

    h1 {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        text-shadow: 2px 1px 1px grey;
    }

    h2 {
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }

    h4 {
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }



    /* Navbar */
    nav {
        font-family: 'Times New Roman', Times, serif;
        font-size: large;
        background-color: white;
    }

    .judul {
        font-size: larger;
        color: #444444;
    }

    .judul:hover {
        color: #7f6000;
    }

    .nav-link {
        color: #444444;
    }

    .nav-link:hover {
        color: #7f6000;
    }

    @media screen and (min-width: 992px) {
        .nav-link:hover {
            border-bottom: 1px solid #7f6000;
            margin-bottom: -1px;
        }
    }

    /* End Of Navbar */

    /* footer */

    /* footer {
        padding-top: 8rem;
    }

    .btn-link {
        color: black;
        font-size: large;
        margin: 1px;
    }

    .btn-link:hover {
        color: #7f6000;
    } */

    /* footer */

    /* Why Us */
    .whyus {
        font-family: Arial, Helvetica, sans-serif;
        margin-top: 80px;
    }

    .whyus h2 {
        font-family: 'Times New Roman', Times, serif;
        text-align: center;
    }

    .whyus img {
        width: 90px;
        height: 80px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .whyus .container {
        background-color: #f5f5f5;
        margin-bottom: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
        scale: 1;
        transition: all 0.5s;
    }

    .whyus .container:hover {
        background-color: #fffaeb;
        border-radius: 15px;
        transform: scale(1.1);
    }

    .whyus h2 {
        text-align: center;
        margin-bottom: 15px;
    }

    /* End Of Why Us */

    /* Services */

    .services {
        margin-top: 60px;
        text-align: center;
    }

    .services h2 {
        font-size: 30px;
        font-family: 'Times New Roman', Times, serif;
        text-align: center;
    }

    .services .container {
        background-color: #f5f5f5;
        margin-bottom: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
        scale: 1;
        transition: all 0.5s;
    }

    .services .container:hover {
        background-color: #fffaeb;
        border-radius: 15px;
        transform: scale(1.1);
    }

    .services .container h5 {
        font-family: 'Times New Roman', Times, serif;
    }

    img {
        width: 60px;
        height: 60px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    /* End Of Services */

    /* Information */
    .information {
        margin-top: 60px;
    }

    .information h4 {
        font-family: 'Times New Roman', Times, serif;
        text-align: center;
    }

    .information table {
        border: 1px;
        text-align: center;
        background-color: white;
    }

    /* End Of Information */

    /* About Us */
    .about-us {
        padding-top: 5rem;
    }

    .about-us .row img {
        height: 250px;
        width: 250px;
    }

    .about-us-title {
        font-family: 'Times New Roman', Times, serif;
        text-align: center;
        font-size: 25px;
    }

    /* End Of About Us */

    .banner {
        background-image: url('../img/bannerindex.png');
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: -25px;
    }

    .banner::after {
        content: '';
        display: block;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(to top, rgb(255, 255, 255, 1)3%, rgb(255, 255, 255, 0.1)15%);
        position: absolute;
        bottom: 0px;
        left: 0;
        z-index: 0;
    }

    @media screen and (max-width:992px) {
        .banner::after {
            display: none;
        }
    }

    .banner .container {
        z-index: 1;
    }

    /* Kartu Pelanggan */

    .kp {
        background-color: white;
        color: black;
    }

    .kp:hover {
        background-color: #292a2d;
        color: white;
    }

    /* End Of Kartu Pelanggan */

    /* Location */
    /* .location {
        margin-top: 60;
    }

    .location h2 {
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    } */

    /* End Of Location */

    /* Halaman Transaksi */
    .transaksi {
        background-color: white;
        margin-top: 50px;
        border-radius: 6px;
        padding: 20px;
    }

    @media screen and (max-width: 992px) {
        .transaksi {
            margin-top: 50px;
        }
    }

    .transaksi h3 {
        font-family: 'Times New Roman', Times, serif;
    }

    /* End Of Halaman Transaksi */

    /* contact-us */
    .contact-us {
        min-height: 100vh;
        /* padding: 5em 5em; */
        display: flex;
        flex-direction: column;
    }

    .contact-h2 {
        margin-bottom: 55px;
    }

    .contact-us .container {
        padding-top: 5rem;
    }

    .contact-us form textarea {
        max-height: 195px;
        min-height: 195px;
    }

    @media screen and (max-width: 992px) {
        .contact-us form textarea {
            min-height: 150px;
            max-height: 150px;
        }
    }

    .contact-us .container .row iframe {
        margin-bottom: 2em;
    }

    /* footer */
    footer {
        margin-bottom: -17px;
    }

    /* End Of footer */
</style>
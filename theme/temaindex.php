<style>
    @media screen and (max-width: 992px) {
        .all {
            padding: 1em;
        }

        h1 {
            font-size: 35px;
        }


    }

    /* Modal
    .modal-header {
        font-family: 'Times New Roman', Times, serif;
    }

    .modalsimpan {
        background-color: #0fa114;
        color: white;
    }

    .modalsimpan:hover {
        background-color: #fff2cc;
        color: black;
    }

    .modaltutup {
        background-color: #f44336;
        color: white;
    }

    .modaltutup:hover {
        background-color: #fff2cc;
        color: black;
    }

    .modallupa {
        background-color: #0b5394;
        color: white;
    }

    .modallupa:hover {
        background-color: #fff2cc;
        color: black;
    } */

    /* End of Modal */

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
        /* transition: all 1s; */
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

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .loginptg:hover {
        background-color: #fff2cc;
        color: black;
        margin-bottom: -0.2px;
    }

    .loginplg:hover {
        background-color: #fff2cc;
        color: black;
        margin-top: -0.2px;
    }

    /* End Of Navbar */

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

    .banner {
        background-image: url('img/bannerindex.png');
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* .bw */

    .banner::after {
        content: '';
        display: block;
        width: 100%;
        height: 100%;
        background-image: linear-gradient(to top, rgb(255, 255, 255, 1)3%, rgb(38, 42, 51, 0.1)15%);
        position: absolute;
        bottom: 0;
        left: -1px;
        z-index: 0;
    }

    @media screen and (max-width:992px) {
        .banner::after {
            display: none;
        }
    }

    .banner .container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        z-index: 1;
    }

    .banner .container p {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    /* Daftar Pelanggan */

    .daftarpelanggan {
        background-color: white;
        color: black;
    }

    .daftarpelanggan:hover {
        background-color: #292a2d;
        color: white;
    }

    /* End Of Daftar Pelanggan */

    /* Why Us */
    .whyus {
        font-family: Arial, Helvetica, sans-serif;
        margin-top: 80px;
    }

    .whyus h2 {
        font-family: 'Times New Roman', Times, serif;
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


    .information table {
        border: 1px;
        text-align: center;
        background-color: white;
    }

    /* End Of Information */

    /* About Us */
    .about-us {
        padding-top: 6rem;
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
        padding-top: 6rem;
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
<style>
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

    footer {
        padding-top: 8rem;
    }

    .btn-link {
        color: black;
        font-size: large;
        margin: 1px;
    }

    .btn-link:hover {
        color: blue;
    }

    /* footer */

    .login {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 1em;
        background-image: url('../img/bannerindex.png');
        background-repeat: no-repeat;
        background-size: cover;
        background-color: white;
    }

    .form {
        width: 500px;
        padding: 2em;
        /* max-height: 300px; */
        background-color: white;
        border-radius: 15px;
        /* box-shadow: 0px 0px 5px; */
    }

    .form h2 {
        text-align: center;
        margin-bottom: 1em;
        color: #3b3b3b;
    }

    .form .user-box {
        position: relative;
    }

    .form .user-box input {
        width: 100%;
        padding: 10px 0;
        font-size: 16px;
        color: #3b3b3b;
        margin-bottom: 15px;
        border: none;
        border-bottom: 1px solid #3b3b3b;
        outline: none;
        background: transparent;
    }

    .form .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #3b3b3b;
        pointer-events: none;
        transition: .5s;
    }

    .form .user-box .tanggal_lahir {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #3b3b3b;
        pointer-events: none;
        transition: .5s;
        background-color: white;
    }

    .form .user-box input:focus~.tanggal_lahir,
    .form .user-box input:valid~.tanggal_lahir {
        top: -20px;
        left: 0;
        color: #3b3b3b;
        font-size: 12px;
        background-color: transparent;
    }

    .form .user-box input:focus~label,
    .form .user-box input:valid~label {
        top: -20px;
        left: 0;
        color: #3b3b3b;
        font-size: 12px;
    }

    .form form .submit .a {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: #3b3b3b;
        font-size: 16px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: .5s;
        margin-top: 1em;
        letter-spacing: 4px;
        border: none;
        background: none;
    }

    .form form .submit .a:hover {
        background: #3b3b3b;
        color: white;
        border-radius: 5px;
    }
</style>
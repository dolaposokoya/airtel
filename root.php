<style>
    @import url('https://fonts.googleapis.com/css2?family=Gilda+Display&family=Montserrat:wght@100;200;300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap');

    @font-face {
        font-family: Jersey;
        src: url(Jersey.ttf);
    }

    @font-face {
        font-family: Digital;
        src: url(digital.ttf);
    }

    @font-face {
        font-family: DigitalMono;
        src: url(digitalmono.ttf);
    }

    :root {
        --theme-color: #ed1c24;
        --Jersey: Jersey;
        --DigitalMono: DigitalMono;
        --Digital: Digital;
        --Montserrat: 'Montserrat', sans-serif;
        --Lato: 'Lato', sans-serif;
        --Poppins: 'Poppins', sans-serif;
        --Gilda: 'Gilda Display', serif;
        --warning: hsl(50, 100%, 58%);
        --error: hsl(8, 100%, 69%);
        --success: hsl(145, 100%, 63%);
        --Arvo: 'Arvo', serif;
        --card-color: rgba(227, 227, 227, .89);
        --Sans: 'Open Sans', sans-serif;
        --green: #71AE0E;
        --navy-blue: #092253;
        --white: #fff;
        --charcoal: #252525;
        --dark-gray: #555555;
        --blue: #215387;
        --white-smoke: whitesmoke;
        --Button: #0083DD;
        --Button_Hover: #14212A;
    }

    * {
        padding: 0;
        list-style: none;
        margin: 0;
        text-decoration: none;
        box-sizing: border-box;
        overflow-x: hidden;
    }

    html {
        scroll-behavior: smooth;
    }

    .loader {
        position: fixed;
        height: auto;
        height: 100vh;
        background-color: rgba(20, 10, 10, 0.9);
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 999999;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 2s all;
    }

    .custom-loader {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: conic-gradient(#0000 10%, var(--theme-color));
        -webkit-mask: radial-gradient(farthest-side, #0000 calc(100% - 16px), #000 0);
        animation: s3 0.5s infinite linear;
    }

    @keyframes s3 {
        to {
            transform: rotate(1turn)
        }
    }
</style>

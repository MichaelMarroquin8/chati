<?php
include("api_request.php");

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$e = substr(str_shuffle($permitted_chars), 0, 6);
echo $e;
//$apikey = "914-1849-5e39d574cb6332.50239770";
$apikey = "49-5850-60f8a9dc148543.86336207";
//$secret = "c1d8bea78804334451b64e528ffdf804c88dd0db";
$secret = "c7264c5348b03f027a144c58ee50595d7b41f5c1";
$uri = "https://aio.sigmamovil.com/api/mail/newsinglemail";
$method = "POST";

$data = json_encode(array(
    "mail" => array(
        "name" => "prueba_chati.$e",
        "category" => array("10125"),
        "subject" => "EMAIL",
        "sender" => "alberto.vonlody@hotmail.com/Verificacion",
        "replyto" => "noreply@sigmamovil.com",
        "scheduleDate" => "now",
        "to" => "m.stivenmarroquin@gmail.com"
    ),

    "content" => array(
        "type" => "html",
        "content" => '
        <style type="text/css">
        /*! Email Template */
        .ni-emails-fill:before {
            content: "";
        }

        .ni-emails:before {
            content: "";
        }

        @font-face {
            font-family: "DM Sans";
            src: url("../fonts/DMSans-Bold.eot");
            src: local("DM Sans Bold"), local("DMSans-Bold"),
                url("../fonts/DMSans-Bold.eot#iefix") format("embedded-opentype"),
                url("../fonts/DMSans-Bold.woff2") format("woff2"),
                url("../fonts/DMSans-Bold.woff") format("woff"),
                url("../fonts/DMSans-Bold.ttf") format("truetype");
            font-weight: bold;
            font-style: normal;
        }

        @font-face {
            font-family: "DM Sans";
            src: url("../fonts/DMSans-Medium.eot");
            src: local("DM Sans Medium"), local("DMSans-Medium"),
                url("../fonts/DMSans-Medium.eot#iefix") format("embedded-opentype"),
                url("../fonts/DMSans-Medium.woff2") format("woff2"),
                url("../fonts/DMSans-Medium.woff") format("woff"),
                url("../fonts/DMSans-Medium.ttf") format("truetype");
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: "DM Sans";
            src: url("../fonts/DMSans-Regular.eot");
            src: local("DM Sans Regular"), local("DMSans-Regular"),
                url("../fonts/DMSans-Regular.eot#iefix") format("embedded-opentype"),
                url("../fonts/DMSans-Regular.woff2") format("woff2"),
                url("../fonts/DMSans-Regular.woff") format("woff"),
                url("../fonts/DMSans-Regular.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        .pb-4,
        .py-4 {
            padding-bottom: 1.5rem !important;
        }

        .pt-5,
        .py-5 {
            padding-top: 2.75rem !important;
        }

        .pb-5,
        .py-5 {
            padding-bottom: 2.75rem !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-primary {
            color: #854fff !important;
        }

        .email-wraper {
            background: #f5f6fa;
            font-size: 14px;
            line-height: 22px;
            font-weight: 400;
            color: #8094ae;
            width: 100%;
        }

        .email-wraper a {
            color: #854fff;
            word-break: break-all;
        }

        .email-wraper .link-block {
            display: block;
        }

        .email-ul {
            margin: 5px 0;
            padding: 0;
        }

        .email-ul:not(:last-child) {
            margin-bottom: 10px;
        }

        .email-ul li {
            list-style: disc;
            list-style-position: inside;
        }

        .email-ul-col2 {
            display: flex;
            flex-wrap: wrap;
        }

        .email-ul-col2 li {
            width: 50%;
            padding-right: 10px;
        }

        .email-body {
            width: 96%;
            max-width: 620px;
            margin: 0 auto;
            background: #ffffff;
        }

        .email-success {
            border-bottom: #1ee0ac;
        }

        .email-warning {
            border-bottom: #f4bd0e;
        }

        .email-btn {
            background: #854fff;
            border-radius: 4px;
            color: #ffffff !important;
            display: inline-block;
            font-size: 13px;
            font-weight: 600;
            line-height: 44px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            padding: 0 30px;
        }

        .email-btn-sm {
            line-height: 38px;
        }

        .email-header,
        .email-footer {
            width: 100%;
            max-width: 620px;
            margin: 0 auto;
        }

        .email-logo {
            height: 40px;
        }

        .email-title {
            font-size: 13px;
            color: #854fff;
            padding-top: 12px;
        }

        .email-heading {
            font-size: 18px;
            color: #854fff;
            font-weight: 600;
            margin: 0;
            line-height: 1.4;
        }

        .email-heading-sm {
            font-size: 24px;
            line-height: 1.4;
            margin-bottom: 0.75rem;
        }

        .email-heading-s1 {
            font-size: 20px;
            font-weight: 400;
            color: #526484;
        }

        .email-heading-s2 {
            font-size: 16px;
            color: #526484;
            font-weight: 600;
            margin: 0;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .email-heading-s3 {
            font-size: 18px;
            color: #854fff;
            font-weight: 400;
            margin-bottom: 8px;
        }

        .email-heading-success {
            color: #1ee0ac;
        }

        .email-heading-warning {
            color: #f4bd0e;
        }

        .email-note {
            margin: 0;
            font-size: 13px;
            line-height: 22px;
            color: #8094ae;
        }

        .email-copyright-text {
            font-size: 13px;
        }

        .email-social li {
            display: inline-block;
            padding: 4px;
        }

        .email-social li a {
            display: inline-block;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            background: #ffffff;
        }

        .email-social li a img {
            width: 30px;
        }

        @media (max-width: 480px) {
            .email-preview-page .card {
                border-radius: 0;
                margin-left: -20px;
                margin-right: -20px;
            }

            .email-ul-col2 li {
                width: 100%;
            }
        }

        .pr-3,
        .px-3 {
            padding-right: 1rem !important;
        }

        .pl-3,
        .px-3 {
            padding-left: 1rem !important;
        }

        .pr-sm-5,
        .px-sm-5 {
            padding-right: 2.75rem !important;
        }

        .pl-sm-5,
        .px-sm-5 {
            padding-left: 2.75rem !important;
        }

        .pt-3,
        .py-3 {
            padding-top: 1rem !important;
        }

        .pt-sm-5,
        .py-sm-5 {
            padding-top: 2.75rem !important;
        }

        .pb-4,
        .py-4 {
            padding-bottom: 1.5rem !important;
        }

        .pb-3,
        .py-3 {
            padding-bottom: 1rem !important;
        }

        .pb-sm-5,
        .py-sm-5 {
            padding-bottom: 2.75rem !important;
        }

        .col-mb-3 {
            position: relative;
            width: 100%;
            padding-right: 14px;
            padding-left: 14px;
        }

        .w-100px {
            width: 250px !important;
        }

        .card-inner {
            padding: 1.25rem;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, 0.125);
            border-radius: 4px;
        }

        .card>hr {
            margin-right: 0;
            margin-left: 0;
        }

        .card>.list-group {
            border-top: inherit;
            border-bottom: inherit;
        }

        .card>.list-group:first-child {
            border-top-width: 0;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }

        .card>.list-group:last-child {
            border-bottom-width: 0;
            border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px;
        }
    </style>
        <table class="email-wraper">
        <tr>
            <td class="py-5">
                <table class="email-header">
                    <tbody>
                        <tr>
                            <td class="text-center pb-4">
                                <a href="#"><img class="email-logo" src="https://i.im.ge/2022/09/27/1Pc06C.logo.png" alt="logo" /></a>
                                <p class="email-title">
                                    Consultorio de riesgos laborales
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="email-body text-center">
                    <tbody>
                        <tr>
                            <td class="px-3 px-sm-5 pt-3 pt-sm-5 pb-4">
                                <img class="w-100px" src="https://i.im.ge/2022/09/27/1PBhKP.FINAL-DEDO-ARRIBA-02.png" alt="In Process" />
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 px-sm-5 pt-3 pt-sm-5 pb-3">
                                <h2 class="email-heading text-success">Bienvenido al consultorio de riesgos laborales SENA
                                </h2>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 px-sm-5">
                                <p>Hola lblNomUsu,</p>
                                <p>Es un placer para nosotros que te unas a nuestros programa</p>

                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 px-sm-5 pt-4 pb-3 pb-sm-5">
                                <p class="email-note">A treves de esta plataforma nuestros aprendices SENA podran resolver
                                    todas tus inquietudes y te ayudaremos en todo lo que este a nuestro alcance'.$e,'</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 px-sm-5 pb-2">
                                <a href="#" class="email-btn">Ingresar</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 px-sm-5">
                                <p></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="email-footer">
                    <tbody>
                        <tr>
                            <td class="text-center pt-4">
                                <p class="email-copyright-text">
                                    Copyright © 2022 CRL SENA. Todos los
                                    derechos reservados.
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>'
    )
));

$api_request = new api_request();
$result = $api_request->send_curl(
    $apikey,
    $secret,
    $uri,
    $method,
    base64_encode($data)
);
echo "<pre>Respuesta:<br>";
print_r(json_decode($result, true));
echo "</pre>";

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: pijush
 * Date: 26/10/16
 * Time: 6:26 AM
 */
class My_mail
{
    /*===========================*/
    public function send_activation_email($to_whom = null, $author_id = null, $email_link_callback = null)
    {
        if ($to_whom != null) {
            $to = $to_whom;
            $uncoded_link = $to_whom . "/" . $author_id;
            $link = $email_link_callback . "/" . $this->encode_email_activation_link($uncoded_link);
            $subject = "Activate your Notecode account";
            $from = 'From:<teamnotecode@notecode.com>' . "\r\n";
            $header = "MIME-Version: 1.0" . "\r\n" . "Content-type:text/html;charset=UTF-8" . "\r\n" . $from;
            $msg = '<!DOCTYPE html>
                <html>
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Activate your Notecode Account</title>
                </head>
                <style type="text/css">
                
                </style>
                <body class="mybody" style="background-color: #fff;margin: 40px;font: 13px/20px normal Helvetica, Arial, sans-serif;color: #4F5155;">
                <div class="container " style="margin: 10px;border: 1px solid #D0D0D0;box-shadow: 0 0 8px #D0D0D0;min-height: 400px;width: 100%;">
                    <div class="email-head">
                        <h2 style="color: #444;background-color: transparent;border-bottom: 1px solid #D0D0D0;font-size: 19px;font-weight: normal;margin: 0 0 14px 0;padding: 14px 15px 10px 15px;">Notecode</h2>
                    </div>
                    <p style="margin: 12px 15px 12px 15px;">Please activate your account by clicking the following link <a href="' . $link . '" class="">Activate</a> Or copy the following link and paste it in the address bar of the web browser.<p></br>
                    <p style="margin: 12px 15px 12px 15px;">"' . $link . '"</p>
                </div>
                </body>
                </html>';
            mail($to, $subject, $msg, $header);

            return TRUE;
        } else {
            return FALSE;
        }

    }

    /*===========================*/
    public function send_password_recovery_mail($to_whom = null, $author_id = null, $email_link_callback = null)
    {
        if ($to_whom != null) {
            $to = $to_whom;
            $uncoded_link = $to_whom . "/" . $author_id;
            $link = $email_link_callback . "/" . $this->encode_email_activation_link($uncoded_link);
            $subject = "Password Recovery mail for your Notecode account";
            $from = 'From:<teamnotecode@notecode.com>' . "\r\n";
            $header = "MIME-Version: 1.0" . "\r\n" . "Content-type:text/html;charset=UTF-8" . "\r\n" . $from;
            $msg = '<!DOCTYPE html>
                <html>
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Recover your Password</title>
                </head>
                <style type="text/css">
                
                </style>
                <body class="mybody" style="background-color: #fff;margin: 40px;font: 13px/20px normal Helvetica, Arial, sans-serif;color: #4F5155;">
                <div class="container " style="margin: 10px;border: 1px solid #D0D0D0;box-shadow: 0 0 8px #D0D0D0;min-height: 400px;width: 100%;">
                    <div class="email-head">
                        <h2 style="color: #444;background-color: transparent;border-bottom: 1px solid #D0D0D0;font-size: 19px;font-weight: normal;margin: 0 0 14px 0;padding: 14px 15px 10px 15px;">Notecode</h2>
                    </div>
                    <p style="margin: 12px 15px 12px 15px;">Please change your password by clicking the following link <a href="' . $link . '" class="">change password</a> Or copy the following link and paste it in the address bar of the web browser.<p></br>
                    <p style="margin: 12px 15px 12px 15px;">"' . $link . '"</p>
                </div>
                </body>
                </html>';
            mail($to, $subject, $msg, $header);

            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*=============================*/
    public function encode_email_activation_link($link = null)
    {
        if ($link != false) {
            $this->load->library('encrypt');
            return urlencode($this->encrypt->encode((trim($link)), '1111988'));
            /*'1111988' is the encryption/decryption key. It can be anything(string only). ENCODE and DECODE both method should use same key!   */
        } else {
            return FALSE;
        }

    }

    /*============================*/
    public function decode_email_activation_link($link = null)
    {
        if ($link != null) {
            $this->load->library('encrypt');
            return $this->encrypt->decode((urldecode(trim($link))), '1111988');
            /*'1111988' is the encryption/decryption key. It can be anything(string only). ENCODE and DECODE both method should use same key!   */
        } else {
            return FALSE;
        }

    }
}
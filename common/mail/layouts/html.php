<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= Html::encode($this->title) ?></title>
                <style type="text/css">
                    /* Client-specific Styles */
                    #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
                    body{width:100% !important;background: #de4f4e; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
                    /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
                    .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
                    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */
                    img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
                    a img {border:none;}
                    .image_fix {display:block;}
                    p {margin: 0px 0px 1em !important;}

                    table td {border-collapse: collapse;}
                    table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
                    /*a {color: #e95353;text-decoration: none;text-decoration:none!important;}*/
                    /*STYLES*/
                    table[class=full] { width: 100%; clear: both; }

                    /*################################################*/
                    /*IPAD STYLES*/
                    /*################################################*/
                    @media only screen and (max-width: 640px) {
                        a[href^="tel"], a[href^="sms"] {
                            text-decoration: none;
                            color: #ffffff; /* or whatever your want */
                            pointer-events: none;
                            cursor: default;
                        }
                        .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                            text-decoration: default;
                            color: #ffffff !important;
                            pointer-events: auto;
                            cursor: default;
                        }
                        table[class=devicewidth] {width: 440px!important;text-align:center!important;}
                        table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
                        table[class="sthide"]{display: none!important;}
                        img[class="bigimage"]{width: 420px!important;height:219px!important;}
                        img[class="col2img"]{width: 420px!important;height:258px!important;}
                        img[class="image-banner"]{width: 440px!important;height:106px!important;}
                        td[class="menu"]{text-align:center !important; padding: 0 0 10px 0 !important;}
                        td[class="logo"]{padding:10px 0 5px 0!important;margin: 0 auto !important;}
                        img[class="logo"]{padding:0!important;margin: 0 auto !important;}

                    }
                    /*##############################################*/
                    /*IPHONE STYLES*/
                    /*##############################################*/
                    @media only screen and (max-width: 480px) {
                        a[href^="tel"], a[href^="sms"] {
                            text-decoration: none;
                            color: #ffffff; /* or whatever your want */
                            pointer-events: none;
                            cursor: default;
                        }
                        .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                            text-decoration: default;
                            color: #ffffff !important; 
                            pointer-events: auto;
                            cursor: default;
                        }
                        table[class=devicewidth] {width: 280px!important;text-align:center!important;}
                        table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
                        table[class="sthide"]{display: none!important;}
                        img[class="bigimage"]{width: 260px!important;height:136px!important;}
                        img[class="col2img"]{width: 260px!important;height:160px!important;}
                        img[class="image-banner"]{width: 280px!important;height:68px!important;}

                    }
                </style>


                </head>
                <body>
                    <div class="block">
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" st-sortable="header">
                            <tbody>
                                <tr>
                                    <td height="20"></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- start of header -->
                        <table width="100%" bgcolor="#de4f4e" cellpadding="0" cellspacing="0" border="0" st-sortable="header">
                            <tbody>
                                <tr>
                                    <td>

                                        <table width="580" bgcolor="#FFF" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                                            <tbody>                                            
                                                <tr>
                                                    <td>
                                                        <!-- logo -->
                                                        <table width="580" cellpadding="0" cellspacing="0" border="0" align="left" class="devicewidth">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="middle" width="50%" style="padding: 20px 0 10px 20px;" class="logo">
                                                                        <div class="imgpop">
                                                                            <a href="http://www.keesonline.nl"><img src="http://keesonline.nl/images/logo.png" alt="/kees" border="0" height="60" style="display:block; border:none; outline:none; text-decoration:none;" class="logo"></a>
                                                                        </div>
                                                                     <td valign="bottom" style="text-align:right;padding-right:20px;" width="50%">
                                                                      <p style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;color:#efedee;font-size:13px;font-weight:700;line-height:18px;"></p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!-- End of logo -->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- end of header -->
                    </div>

                    <div class="block">
                        <!-- image + text -->
                        <table width="100%" bgcolor="#de4f4e" cellpadding="0" cellspacing="0" border="0" st-sortable="bigimage">
                            <tbody>
                                <tr>
                                    <td>
                                        <table bgcolor="#ffffff" width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" modulebg="edit">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table width="540" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidthinner">
                                                            <tbody>
                                                                <tr>
                                                            <!-- >
                                                            <td align="center">
                                                               <a target="_blank" href="#"><img width="540" border="0" height="282" alt="" style="display:block; border:none; outline:none; text-decoration:none;" src="img/bigimage.png" class="bigimage"></a>
                                                            </td>
                                                         </tr>
                                                            --> 
                                                            <!-- content -->
                                                            <tr>
                                                                <td style="font-family:'Lora', serif;font-size:14px;color:#4E5860;text-align:left;line-height:20px;padding-top:30px;">
                                                                    <?php $this->beginBody() ?>
																    <?= $content ?>
																 </td>
															</tr>
                                                                    <div class="block">
                                                                        <!-- image + text -->
                                                                        <table width="100%" bgcolor="#de4f4e" cellpadding="0" cellspacing="0" border="0" st-sortable="bigimage">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <table bgcolor="#ffffff" width="580" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" modulebg="edit">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <table width="580" border="0" cellpadding="0" cellspacing="0">
                                                                                                          <tr>
                                                                                                            <td colspan="4">
                                                                                                              <p style="font-family: 'Lora', serif;color:#333333;font-size:14px;line-height:18px;padding:20px;">
                                                                                                              Met vriendelijke groet,<br /><br /><br />
                                                                                                              <strong><span style="color:#de4f4e;">/</span>kees</p></strong>
                                                                                                            </td>
                                                                                                          </tr>
                                                                                                          <tr>
                                                                                                          	<td colspan="2" rowspan="2" style="padding:20px;text-align: center;">
                                                                                                          	  <a style="color:#FFF;" href="https://www.facebook.com/releaz"><img width="50" src="http://www.releaz.nl/mail/mail-fb.png"/></a>
                                                                                                              <a style="color:#FFF;" href="https://twitter.com/releaz"><img width="50" src="http://www.releaz.nl/mail/mail-tw.png"/></a>
                                                                                                              <a style="color:#FFF;" href="https://www.linkedin.com/company/releaz"><img width="50" src="http://www.releaz.nl/mail/mail-li.png"/></a>
                                                                                                          	</td>
                                                                                                          	<td colspan="2" style="padding-left:20px;padding-top:15px;background:#3f3f3e;" width="30%">
                                                                                                              <p style="font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;color:#FFF;font-size:20px;line-height:28px;">
                                                                                                              085 876 99 57 <br/>
                                                                                                              <a style="color:#FFF;text-decoration:none;" href="mailto:hallo@keesonline.nl">hallo@keesonline.nl</a><br />
                                                                                                              <a style="color:#FFF;text-decoration:none;" href="http://www.keesonline.nl">www.keesonline.nl</a></p>
                                                                                                            </td>
                                                                                                          </tr>
                                                                                                          <tr>
                                                                                                            <td style="padding-left:20px;padding-top:15px;background:#3f3f3e;" width="30%">
                                                                                                              <p style="font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;color:#FFF;font-size:11px;line-height:18px;">
                                                                                                              <strong><span style="color:#de4f4e;">/</span>kees</strong> Groningen<br />
                                                                                                              Zeewinde 3-11A<br />
                                                                                                              9738 AM Groningen</p>
                                                                                                            </td>
                                                                                                             <td style="padding-left:20px;padding-top:15px;background:#3f3f3e;" width="30%">
                                                                                                              <p style="font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;color:#FFF;font-size:11px;line-height:18px;">
                                                                                                              <strong><span style="color:#de4f4e;">/</span>kees</strong> Amsterdam<br />
                                                                                                              Bankastraat 24F<br />
                                                                                                              1094 EE, Amsterdam</p>
                                                                                                            </td>
                                                                                                          </tr>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                                </table>
                                                                                                </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                                </table>
                                                                                                </div></body></html>

    
    
<?php $this->endPage() ?>

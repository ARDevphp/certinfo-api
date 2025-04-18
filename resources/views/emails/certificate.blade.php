<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body class="body" style="width:100%;height:100%;padding:0;Margin:0">
<div dir="ltr" class="es-wrapper-color" lang="ru" style="background-color:#F7F7F7">
    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" role="none"
           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#F7F7F7">
        <tr>
            <td valign="top" style="padding:0;Margin:0">
                <table cellpadding="0" cellspacing="0" class="es-header" align="center" role="none">
                    <td align="center" style="padding:0;Margin:0">
                        <table class="es-header-body" align="center" cellpadding="0" cellspacing="0"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                               role="none">
                            <tr>
                                <td align="left"
                                    style="padding:20px;Margin:0;border-radius:10px 10px 0px 0px;background: linear-gradient(180deg, #A5C0EE 0%, #FBC5EC 100%);">
                                    <table cellpadding="0" cellspacing="0" width="100%" role="none"
                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                        <tr>
                                            <td class="es-m-p0r" valign="top" align="center"
                                                style="padding:0;Margin:0;width:560px">
                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:1px"
                                                       role="presentation">
                                                    <tr>
                                                        <td align="center" style="padding:0;Margin:0;font-size:0px"><a
                                                                target="_blank" href="#"
                                                                style="mso-line-height-rule:exactly;text-decoration:underline;color:#3D7781;font-size:14px"
                                                            >
                                                                <strong>Cert info</strong>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </table>
            </td>
        </tr>
    </table>
    <table class="es-content" cellspacing="0" cellpadding="0" align="center" role="none"
           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:100%;table-layout:fixed !important">
        <tr>
            <td align="center" style="padding:0;Margin:0">
                <table class="es-content-body"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#ffffff;width:600px"
                       cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" role="none">
                    <tr>
                        <td align="left" bgcolor="#ffffff"
                            style="padding:0;Margin:0;padding-top:30px;padding-right:20px;padding-left:20px;background-color:#ffffff">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr>
                                    <td align="left" style="padding:0;Margin:0;width:558px">
                                        <table cellpadding="0" cellspacing="0" width="100%" role="presentation"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr>
                                                <td align="center" class="es-m-txt-c"
                                                    style="padding:0;Margin:0;padding-bottom:30px">
                                                    <h1
                                                        style="Margin:0;font-family:georgia, times, 'times new roman', serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:30px;font-style:normal;font-weight:normal;line-height:36px;color:#023047">
                                                        <strong
                                                            style="color: #CCB800">{{ $certificate->student_name . " " . $certificate->student_family }}</strong>

                                                        <br><strong>{{ $certificate->course->name  }}</strong>
                                                        <br>Kursini muvoffaqiyatli tugatkanligingiz uchun
                                                        <br><strong>EVEREST EDUCATION</strong>
                                                        <br>Sizni sertifikat bilan taqdirlaydi!
                                                    </h1>
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class="es-m-txt-c"
                                        style="padding:0;Margin:0;padding-top:30px;padding-bottom:5px">
                                                        <span
                                                            style="Margin:0;font-family:georgia, times, 'times new roman', serif;mso-line-height-rule:exactly;letter-spacing:0;font-size:25px;font-style:normal;font-weight:bold;line-height:18px;color:#023047;margin-right: 20px; display: inline-flex; align-items: center; ">
                                                            <a style="text-decoration: none;color: black; display: inline-flex; align-items: center;"
                                                               href="http://localhost:5173/certificates/{{ $certificate->id }}">
                                                               Sertificatni Ko'rish
                                                            </a>
                                                        </span>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>

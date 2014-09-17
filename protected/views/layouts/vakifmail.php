<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>email_template</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body bgcolor="#DDDDDD" style="padding:0; margin:0">
<!-- Save for Web Slices (email_template.psd) -->
<table id="email_template" width="640" border="0" cellpadding="0" cellspacing="0" bgcolor="#DDDDDD" style="margin:0; padding:0; border:0;">
	<tr>
		<td colspan="7" width="640" height="100">
			<img id="header" src="<?php echo Yii::app()->getBaseUrl(true)?>/img/header.png" width="640" height="100" alt="" /></td>
	</tr>
	<tr>
		<td rowspan="7" width="20" height="780" bgcolor="#DDDDDD" style="width:20px;">&nbsp;</td>
		<td rowspan="5" width="30" height="730" bgcolor="#FFFFFF">&nbsp;</td>
		<td colspan="3" width="540" height="60" bgcolor="#FFFFFF" style="text-align:center;">
			<div style="margin:10px 0; font-family:'Helvatica Nue', Arial, Helvetica, sans-serif;color:#666666;font-size:20px;font-weight:bold;line-height:1"><span id="status_title" style="line-height:30px">Vakfa İlettiğiniz Mesaj</span>
            </div>
            <hr style="border:1px solid #dddddd; margin-top:20px;" />
        </td>
		<td rowspan="5" width="30" height="730" bgcolor="#FFFFFF">&nbsp;</td>
		<td rowspan="7" width="20" height="780" bgcolor="#DDDDDD">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" valign="top" width="540" height="170" bgcolor="#FFFFFF" style="line-height:16px;padding:10px 25px;">
        <p style="font-family:'Helvatica Nue', Arial, Helvetica, sans-serif;color:#666666;font-size:16px; font-weight:bold;line-height:32px">
    Sayın <span id="user_name"><?php if(isset($data['name'])) echo $data['name'];  ?></span>;
    </p>
    
    <p style="font-family:'Helvatica Nue', Arial, Helvetica, sans-serif;color:#666666;font-size:14px">
    <?php if(isset($data['message'])) echo $data['message'];  ?> <strong>
    <a href="#" target="_blank" 
    style="color:#15A085; text-decoration:underline"
    onmouseover="style.color='#107764'; return true;"
    onmouseout="style.color='#15A085'; return true;"></a></strong></p>
                    <br></br>  
                    <br></br>
                    <p><b>Süleymaniye Kültür Sanat Eğitim ve Sağlık Vakfı</b></p>
<p style="font-family:'Helvatica Nue', Arial, Helvetica, sans-serif;color:#666666;font-size:14px">
    </p>
		</td>
	</tr>
       	<tr>
		<td width="25" height="151" bgcolor="#FFFFFF">&nbsp;</td>
		<td width="438" valign="top" style="padding:0 25px; border:1px solid #DDDDDD; background-color:#f2fffc">
        <p style="font-family:'Helvatica Nue', Arial, Helvetica, sans-serif;color:#15A085;font-size:16px; font-weight:bold;line-height:20px">
    Bize Yazdığınız Mesajı:
    </p>
    <p style="font-family:'Helvatica Nue', Arial, Helvetica, sans-serif;color:#666666;font-size:14px"><?php if(isset($data['gelenmesaj'])) echo $data['gelenmesaj'];  ?>
    </p>
    <p style="font-family:'Helvatica Nue', Arial, Helvetica, sans-serif;color:#666666;font-size:14px">
     <strong>
    <a href="#" target="_blank" 
    style="color:#15A085; text-decoration:underline"
    onmouseover="style.color='#107764'; return true;"
    onmouseout="style.color='#15A085'; return true;"></a></strong>
    </p>
        </td>
		<td width="25" height="151" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3" bgcolor="#FFFFFF" style="padding:20px 0 10px;">
			<a href="#" target="_blank"></a>
            <p style="font-family:'Helvatica Nue', Arial, Helvetica, sans-serif;color:#999999;font-size:12px">
    &raquo; Vakıf ile ilgili görüşleriniz, sorularınız ve istekleriniz için <strong>
    <a href="mailto:market@eba.gov.tr" target="_blank" 
    style="color:#C65E28; text-decoration:none"
    onmouseover="style.color='#107764'; return true;"
    onmouseout="style.color='#15A085'; return true;">info@suleymaniyevakfi.comtr</a></strong> adresine e-posta gönderebilirsiniz.
    </p>
      </td>
	</tr>
	<tr>
		<td colspan="5" width="600" height="10" bgcolor="#C65E28">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5" style="padding:5px 0;">
        <p style="font-family:'Helvatica Nue', Arial, Helvetica, sans-serif;color:#999999;font-size:12px; text-align:center">
        &copy; 2014 | Süleymaniye Kültür Sanat Eğitim ve Sağlık Vakfı</p></td>
	</tr>
</table>
<!-- End Save for Web Slices -->
</body>
</html>
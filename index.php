<?php 
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//Read text file with email addresses
	$file = fopen("emails.txt","r");
	$emailArray = array();
	while(! feof($file))
	{
		$emailArray[] = fgets($file);
	}
		if(isset($_POST['sendmail'])) {
		//Include required PHPMailer files
		require 'includes/credentials.php';
		$mail = new PHPMailer;


			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;       //Enable verbose debug output
			$mail->isSMTP();                            //Send using SMTP
		    $mail->Host = 'smtp-pulse.com';             //Set the SMTP server to send through
			$mail->SMTPAuth = true;                   //Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                  // SMTP password
			$mail->SMTPSecure = 'ssl';               //Enable implicit TLS encryption
			$mail->Port = 465;                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


			//Recipients
		  $mail->setFrom('majorp@woclink.com', $_POST['subject']);
	   		//Add recipients by looping through the list of emails
			foreach($emailArray as $val)
			{
		  $mail->addAddress($val);
			}
		  $mail->addReplyTo(EMAIL);
		  //Content
		  $mail->isHTML(true);                                  //Set email format to HTML
		  $mail->Subject = $_POST['subject'];
		  $mail->Encoding = 'base64';
		  $mail->Body = '
		  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html
  xmlns="http://www.w3.org/1999/xhtml"
  xmlns:v="urn:schemas-microsoft-com:vml"
  xmlns:o="urn:schemas-microsoft-com:office:office"
>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
      /* Reset styles */
      body {
        margin: 0;
        padding: 0;
        min-width: 100%;
        width: 100% !important;
        height: 100% !important;
      }
      body,
      table,
      td,
      div,
      p,
      a {
        -webkit-font-smoothing: antialiased;
        text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
        line-height: 100%;
      }
      table,
      td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        border-collapse: collapse !important;
        border-spacing: 0;
      }
      img {
        border: 0;
        line-height: 100%;
        outline: none;
        text-decoration: none;
        -ms-interpolation-mode: bicubic;
      }
      #outlook a {
        padding: 0;
      }
      .ReadMsgBody {
        width: 100%;
      }
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
      .ExternalClass p,
      .ExternalClass span,
      .ExternalClass font,
      .ExternalClass td,
      .ExternalClass div {
        line-height: 100%;
      }

      /* Rounded corners for advanced mail clients only */
      @media all and (min-width: 560px) {
        .container {
          border-radius: 8px;
          -webkit-border-radius: 8px;
          -moz-border-radius: 8px;
          -khtml-border-radius: 8px;
        }
      }

      /* Set color for auto links (addresses, dates, etc.) */
      a,
      a:hover {
        color: #127db3;
      }
      .footer a,
      .footer a:hover {
        color: #999999;
      }
    </style>

    <!-- MESSAGE SUBJECT -->
    <title>'.$_POST['subject'].'</title>
    <![endif]-->
    <!--[if gte mso 9]>
      <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG />
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
      </xml>
    <![endif]-->
  </head>

  <!-- BODY -->
  <!-- Set message background color (twice) and text color (twice) -->
  <body
    topmargin="0"
    rightmargin="0"
    bottommargin="0"
    leftmargin="0"
    marginwidth="0"
    marginheight="0"
    width="100%"
    style="
      border-collapse: collapse;
      border-spacing: 0;
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      -webkit-font-smoothing: antialiased;
      text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%;
      line-height: 100%;
      background-color: #f0f0f0;
      color: #000000;
    "
    bgcolor="#F0F0F0"
    text="#000000"
  >
    <!-- SECTION / BACKGROUND -->
    <!-- Set message background color one again -->
    <table
      width="100%"
      align="center"
      border="0"
      cellpadding="0"
      cellspacing="0"
      style="
        border-collapse: collapse;
        border-spacing: 0;
        margin: 0;
        padding: 0;
        width: 100%;
      "
      class="background"
    >
      <tr>
        <td
          align="center"
          valign="top"
          style="
            border-collapse: collapse;
            border-spacing: 0;
            margin: 0;
            padding: 0;
          "
          bgcolor="#F0F0F0"
        >
          <!-- WRAPPER -->
          <!-- Set wrapper width (twice) -->
          <table
            border="0"
            cellpadding="0"
            cellspacing="0"
            align="center"
            width="560"
            style="
              border-collapse: collapse;
              border-spacing: 0;
              padding: 0;
              width: inherit;
              max-width: 560px;
            "
            class="wrapper"
          >
            <tr>
              <td
                align="center"
                valign="top"
                style="
                  border-collapse: collapse;
                  border-spacing: 0;
                  margin: 0;
                  padding: 0;
                  padding-left: 6.25%;
                  padding-right: 6.25%;
                  width: 87.5%;
                  padding-top: 20px;
                  padding-bottom: 20px;
                "
              >
                <!-- LOGO -->
                <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2. URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content=logo&utm_campaign={{Campaign-Name}} -->
                <a
                  target="_blank"
                  style="text-decoration: none"
                  href="https://tiny.one/yeab7jtp"
                  ><img
                    border="0"
                    vspace="0"
                    hspace="0"
                    src="https://updatenewsletter.online/newheaderlogo.png"
                    width="100"
                    height="50"
                    alt="Logo"
                    title=""
                    style="
                      color: #000000;
                      font-size: 10px;
                      margin: 0;
                      padding: 0;
                      outline: none;
                      text-decoration: none;
                      -ms-interpolation-mode: bicubic;
                      border: none;
                      display: block;
                    "
                /></a>
              </td>
            </tr>

            <!-- End of WRAPPER -->
          </table>

          <!-- WRAPPER / CONTEINER -->
          <!-- Set conteiner background color -->
          <table
            border="0"
            cellpadding="0"
            cellspacing="0"
            align="center"
            bgcolor="#FFFFFF"
            width="560"
            style="
              border-collapse: collapse;
              border-spacing: 0;
              padding: 0;
              width: inherit;
              max-width: 560px;
            "
            class="container"
          >
            <!-- HEADER -->
            <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
            <tr>
              <td
                align="center"
                valign="top"
                style="
                  border-collapse: collapse;
                  border-spacing: 0;
                  margin: 0;
                  padding: 0;
                  padding-left: 6.25%;
                  padding-right: 6.25%;
                  width: 87.5%;
                  font-size: 24px;
                  font-weight: bold;
                  line-height: 130%;
                  padding-top: 25px;
                  color: #2124b1;
                  font-family: sans-serif;
                "
                class="header"
              >
              '.$_POST['subject'].'
              </td>
            </tr>

            <!-- HERO IMAGE -->
            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including "auto"). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
           


            
            <!-- PARAGRAPH -->
            <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            <tr>
              <td
                align="left"
                valign="top"
                style="
                  border-collapse: collapse;
                  border-spacing: 0;
                  margin: 0;
                  padding: 0;
                  padding-left: 6.25%;
                  padding-right: 6.25%;
                  width: 87.5%;
                  font-size: 15px;
                  font-weight: 400;
                  line-height: 160%;
                  padding-top: 25px;
                  color: #000000;
                  font-family: sans-serif;
                "
                class="paragraph"
              >
              '.$_POST['message'].'
              </td>
            </tr>
        
            <tr>
              <td
                align="left"
                valign="top"
                style="
                  border-collapse: collapse;
                  border-spacing: 0;
                  margin: 0;
                  padding: 0;
                  padding-left: 6.25%;
                  padding-right: 6.25%;
                  width: 87.5%;
                  font-size: 14px;
                  font-weight: 400;
                  line-height: 160%;
                  padding-top: 25px;
                  color: #000000;
                  font-family: sans-serif;
                "
                class="paragraph"
              >
              
              </td>
            </tr>
            <!-- PARAGRAPH -->
            <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            <tr>
              <td
                align="center"
                valign="top"
                style="
                  border-collapse: collapse;
                  border-spacing: 0;
                  margin: 0;
                  padding: 0;
                  padding-left: 6.25%;
                  padding-right: 6.25%;
                  width: 87.5%;
                  font-size: 13px;
                  font-weight: 400;
                  line-height: 160%;
                  padding-top: 20px;
                  padding-bottom: 25px;
                  color: #000000;
                  font-family: sans-serif;
                "
                class="paragraph"
              >
              Contact: +921 445 55
              </td>
            </tr>

            <!-- End of WRAPPER -->
          </table>

          <!-- WRAPPER -->
          <!-- Set wrapper width (twice) -->
          <table
            border="0"
            cellpadding="0"
            cellspacing="0"
            align="center"
            width="560"
            style="
              border-collapse: collapse;
              border-spacing: 0;
              padding: 0;
              width: inherit;
              max-width: 560px;
            "
            class="wrapper"
          >
            <!-- FOOTER -->
            <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
            <tr>
              <td
                align="center"
                valign="top"
                style="
                  border-collapse: collapse;
                  border-spacing: 0;
                  margin: 0;
                  padding: 0;
                  padding-left: 6.25%;
                  padding-right: 6.25%;
                  width: 87.5%;
                  font-size: 13px;
                  font-weight: 400;
                  line-height: 150%;
                  padding-top: 20px;
                  padding-bottom: 20px;
                  color: #999999;
                  font-family: sans-serif;
                "
                class="footer"
              >
               
                <!-- ANALYTICS -->
              </td>
            </tr>

            <!-- End of WRAPPER -->
          </table>

          <!-- End of SECTION / BACKGROUND -->
        </td>
      </tr>
    </table>
  </body>
</html>		 
		  ';
		// print_r($_FILES['file']); exit;
			for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
				$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    
				// Optional name
			}

			if(!$mail->send()) {
				$msg='Message could not be sent: ' . $mail->ErrorInfo;
				$type = "warning";
			} else {
				$msg="Message has been sent";
				$type = "success";
			}
		}
	 ?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Send Emails </title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Send emails" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/><!--stylesheet-->
	<link rel="stylesheet" href="css/font-awesome.css"><!--font_aswesome_icons-->
	<link href="http://fonts.googleapis.com/css?family=Basic" rel="stylesheet"><!--online-fonts-->
	<link href="http://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet"><!--online-fonts-->
</head>
<body>
<script src='ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<body>
<div class="w3ls-head">
		<h1>Send News Letters</h1>
		<!--728x90-->
</div>
<div class="w3ls-content">
	<div class="w3ls-headding">
		<h2> Send messages in a goal</h2>
		<?php if(isset($msg)){ ?>
		<div class="alert alert-<?php echo $type?>">
				<p class="mb-0"><?php echo $msg?></p>
		</div>
        <?php }?>
		<p>Fill in the required fields</p>
	</div>
	<div class="w3l-form">
		<form action="#" method="post" enctype="multipart/form-data">
		<label for="subject" class="form-label" style="color:#fff">Subject:</label>
			<div class="w3ls-input" style="margin-top:10px;">
				<input type="text" name="subject" placeholder="Email Suject" maxlength="50" required=""/>
			</div>
			<label for="message" class="form-label" style="color:#fff">Message:</label>
			<div class="w3ls-input" style="margin-top:10px;margin-bottom:10px;">
            <textarea class="form-control" type="textarea" id="message" name="message"  maxlength="6000" ></textarea>
			</div>
			<label for="message" class="form-label" style="color:#fff">Files:</label>
			<div class="w3ls-input" style="margin-top:10px;">
			<input name="file[]" multiple="multiple" class="form-control" type="file" id="file">
			</div>
			<div class="w3ls-btn">
			<!--728x90-->
				<button type="submit" name="sendmail">Send</button>
			</div>
		</form>
	</div>
</div>
<div class="w3ls-icons">
	
	<!--728x90-->
</div>
<footer> <a >Email Scripts</a></footer>
</body>

</html>
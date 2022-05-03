<?php 
    class Utils
    {
        public static function sendTextMail($to, $subject, $message, $from = '', $cc = '', $bcc = '', $headers = array())
        {
            if (is_array($to)) {
                $to = implode(',', $to);
                $headers[] = 'To:' . (is_array($to) ? implode(',', $to) : $to);
            }
            if ($cc) {
                $headers[] = 'Cc:' . (is_array($cc) ? implode(',', $cc) : $cc);
            }
            if ($bcc) {
                $headers[] = 'Bcc:' . (is_array($bcc) ? implode(',', $bcc) : $bcc);
            }
            if ($from) {
                $headers[] = 'From: ' . $from;
            }
            $headers = implode("\r\n", $headers);
            
            //mb_send_mail($to, $subject, $message, $headers);
            mail($to, utf8_decode($subject), utf8_decode($message), $headers);
        }
    }

    if ($_POST && isset($_POST['inputEmail1'])) {
        Utils::sendTextMail($_POST['inputEmail1'], 'hobidd - Free Trial Password', "Welcome to hobidd!\n\nHere is your free trial password\n\nusername: business\npassword: SiLGKiY2\n\nTry it out!\n\nwww.hobidd.com/en", 'office@hobidd.com');

        Utils::sendTextMail('office@hobidd.com', 'hobidd - New Free Trial Password', 'New trial password request from Email ' . $_POST['inputEmail1'], 'office@hobidd.com');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />

        <link rel="icon" type="image/png" href="/img/favicon.png" sizes="512x512">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="img/custom.css">
    </head>
    <body>
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <img class="img-fluid mx-auto d-block" src="/img/part1.jpg">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                <a href="/de/">
                <div class="container" style="background: #55aeea; height: 130px;">
                    <div class="row justify-content-center align-items-center" style="height: 130px;">
                        <div class="col px-5">
                            <h1 class="big-header pb-2" style="font-size: 50px;">LOGIN HERE PLEASE</h1>
                        </div>
                    </div>
                </div>
                </a>
                </div>
            </div>

            <?php if ($_POST && isset($_POST['inputEmail1'])) { ?>
                    <div class="row mb-5">
                        <div class="col">
                        <div class="container" style="background: #55aeea; height: 130px;">
                            <div class="row justify-content-center align-items-center" style="height: 130px;">
                                <div class="col px-5">
                                    <h1 class="big-header pb-2" style="font-size: 50px;">FREE TRIAL PASSWORD SENT</h1>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php } else { ?>
                   <div class="row mb-5">
                        <div class="col">
                            <div class="container" style="background: #55aeea;">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col">
                                        &nbsp;
                                    </div>
                                    <div class="col-6 py-4 text-center">
                                    <form class="justify-content-center" action="index.php" method="post" >
                                    <div class="form-group justify-content-center">
                                        <input type="email" class="form-control" id="inputEmail1" name="inputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                                        <small id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</small>
                                    </div>
                                    <button type="submit" class="btn btn-light">REQUEST YOUR FREE TRIAL PASSWORD</button>
                                    </form>
                                    </div>
                                    <div class="col">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGXKXnNmRF-Z0lZpt0_tITtjvkyq5VrSE&callback=initMap" async defer></script>

        <!-- Start of LiveChat (www.livechatinc.com) code -->
        <script type="text/javascript">
	    if (matchMedia('only screen and (min-width: 992px)').matches) {
            window.__lc = window.__lc || {};
            window.__lc.license = 9791140;
            (function() {
            var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
            lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
            })();
        }
        </script>
        <!-- End of LiveChat code -->
    </body>
</html>
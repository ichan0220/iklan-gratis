<!DOCTYPE html>

<html>
    <head>
        <?php include_once ("part-head.php") ?>

        <title>One East Apartment</title>
    </head>

    <body>
        <?php include_once ("part-header.php") ?>

            <section id="contact" class="full-browser">
                <div class="contact-bitmap full-browser"></div>
                <div class="contact-pattern full-browser"></div>
                <div class="full-browser">
                    <div class="wrapper">
                        <div class="contact-logo">
                            <img src="themes/one-east/img/contact/contact-logo.png">
                            <p style="text-transform:uppercase;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam elit. Aliquam elit. </p>
                        </div>
                        <div class="contact-form">
                            <form  method='post' action='contact.php'>
                                <div class="form">
                                    <div class="name">
                                        <input type="text" name="name" placeholder="Name"/>
                                    </div>
                                    <div class="email">
                                        <input type="text" name="email" placeholder="E-mail"/>
                                    </div>
                                    <div class="subject">
                                        <input type="text" name="subject" placeholder="Subject"/>
                                    </div>
                                    <div class="address">
                                        <textarea name="address" placeholder="Address"></textarea>
                                    </div>
                                    <div class="submit">
                                        <input type="submit" value="SUBMIT"/>
                                    </div>
                                </div>
                            </form>
                            <div class="map">
                                <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=-7.27989,112.781181&amp;num=1&amp;t=m&amp;ie=UTF8&amp;ll=-7.276442,112.782083&amp;spn=0.024563,0.042272&amp;z=14&amp;output=embed"></iframe>
                                <p>ONE EAST<br />MARKETING GALLERY<br />JL. KERTAJAYA INDAH TIMUR<br />BLOK S - III N<br />SURABAYA</p>
                                <p>INFO@ONE.EAST.COM <br /> P. +62XXXXXXXXXX<br /> F. +62XXXXXXXXXX</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php include_once ("part-footer.php") ?>

        <?php include_once ("part-foot.php") ?>
    </body>

    <?php

    // print_r($_POST);
    // exit;
      //send email
      $name = $_REQUEST['name'] ;
      $email = $_REQUEST['email'] ;
      $subject = $_REQUEST['subject'] ;
      $address = $_REQUEST['address'] ;
      $message = $address;
                // echo 'email = ' . $email .'/n';
                // echo   'subject = ' .  $subject .'/n';
                // echo   'address = ' . $address;
      mail("adoel4razman@gmail.com", $subject,
      $message, "From:" . $email);
      echo "Thank you for using our mail form";

    ?>

    <style type="text/css">
        #contact .contact-form .form input,#contact .contact-form .form textarea {
            padding: 10px;
            background: #665b59;
            margin: 1px;
            color: #fff;

            }
        #contact .contact-form .form .name,
        #contact .contact-form .form .email,
        #contact .contact-form .form .subject,
        #contact .contact-form .form .address {border: 2px solid #8d7249;}
        #contact .contact-form .form .address {width: 400px}
        #contact .contact-form .form textarea { width: 397px }
        #contact .contact-form .form .submit {
                    width: 150px;
                    height: 38px;
                    background: #8d7249;
                    float: right;
                }
        #contact .contact-form .form .submit input {
                    color: #fff;
                    font-weight: bold;
                    font-size: 20px;
                }
        .full-browser {
            overflow: scroll;
        }
    </style>
</html>

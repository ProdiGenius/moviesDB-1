<html>
<head>
    <title>Add a New Movie</title>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

        $(".submit_btn").click(function () {

            var name = $('input[name="name"]').val();
            var link = $('input[name="link"]').val();
            var host = $('input[name="host"]').val();

            var challengeField = $("#recaptcha_challenge_field").val();
            var responseField = $("input#recaptcha_response_field").val();

            var proceed = true;
            if (name == "") {
                $('input[name=name]').css('border-color', 'red');
                proceed = false;
            }
            if (link == "") {
                $('input[name=link]').css('border-color', 'red');
                proceed = false;
            }
            if (host == "") {
                $('input[name=host]').css('border-color', 'red');
                proceed = false;
            }

            if (proceed) {
                post_data = {'name': name, 'link': link, 'host': host, 'challengeField': challengeField, 'responseField': responseField};

                $.ajax ({
                    type: 'POST',
                    url: 'submit.php',
                    data: post_data,
                    async: false,
                    success: function(response) {
                        if (response.type == 'error') {
                            output = '<div class="error">' + response.text + '</div>';
                        } else {
                            output = '<div class="success">' + response.text + '</div>';

                            $('#link_form input').val('');
                        }

                        $("#result").hide().html(output).slideDown();

                    },
                    error: function (xhr, status, errorThrown) {
                        console.log(xhr);
                    },
                    dataType:"json"

                });


            }
        });

        $("#link_form input").keyup(function () {
            $("#link_form input").css('border-color', '');
            $("#result").slideUp();
        });
      });



        function checkLinks() {
            var valid_domains = new Array("ovfile.com", "videozer.com", "royalvids.eu", "divxstage.eu",
                "divxstage.net", "veevr.com", "gorillavid.com", "gorillavid.in", "megavideo", "movshare.net",
                "zshare", "tudou", "youtube", "youku", "vidbux.com", "putlocker.com", "sockshare.com",
                "videobb.com", "videoweed.es", "videoweed.com", "smotri.com", "fairyshare.com", "milledrive.com",
                "divxden.com", "vidxden.com", "miloyski.com", "sina.com", "putfile.com", "novamov.com",
                "wisevid.com", "loombo.com", "vidbux.com", "zalaa.com", "vidhog.com", "xvidstage.com",
                "nowvideo.eu", "divxbase.com", "nosvideo.com", "vidbull.com", "mooshare.biz", "180upload.com",
                "videobam.com", "allmyvideos.net", "modovideo.com", "vidspot.net", "vodlocker.com", "movreel.com",
                "video.tt", "faststream.in", "vidto.me", "firedrive.com");
            inputs = document.getElementById('host', 'link').elements;
            validation = true;
            for (i = 1; i < inputs.length - 1; i++) {
                if (inputs[i].value.length > 0) {
                    valid = false;
                    for (did in valid_domains) {
                        if ((" " + inputs[i].value).indexOf(valid_domains[did]) > 0) {
                            valid = true;
                            break;
                        }
                    }
                    if (valid == false) {
                        alert("This host is not allowed: " + inputs[i].value);
                        validation = false;
                        inputs[i].focus();
                        break;
                    }
                }
            }
            return validation;
        }


    </script>

    <script type="text/javascript">

    </script>

    <style type="text/css">
        #link_form {
            width: 500px;
            padding: 20px;
            border: 1px solid #DDD;
            border-radius: 5px;
            font-family: Arial;
            font-size: 11px;
            font-weight: bold;
            color: #666666;
            background: #FAFAFA;
            margin-right: auto;
            margin-left: auto;
        }

        #link_form legend {
            font-size: 15px;
            color: #C9C9C9;
        }

        #link_form label {
            display: block;
            margin-bottom: 5px;
        }

        #link_form label span {
            float: left;
            width: 100px;
            color: #666666;
        }

        #link_form input {
            height: 25px;
            border: 1px solid #DBDBDB;
            border-radius: 3px;
            padding-left: 4px;
            color: #666;
            width: 180px;
            font-family: Arial, Helvetica, sans-serif;
        }

        #link_form textarea {
            border: 1px solid #DBDBDB;
            border-radius: 3px;
            padding-left: 4px;
            color: #666;
            height: 100px;
            width: 180px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .submit_btn {
            border: 1px solid #D8D8D8;
            padding: 5px 15px 5px 15px;
            color: #8D8D8D;
            text-shadow: 1px 1px 1px #FFF;
            border-radius: 3px;
            background: #F8F8F8;
        }

        .submit_btn:hover {
            background: #ECECEC;
            cursor: pointer;
        }

        .success {
            background: #CFFFF5;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #B9ECCE;
            border-radius: 5px;
            font-weight: normal;
        }

        .error {
            background: #FFDFDF;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #FFCACA;
            border-radius: 5px;
            font-weight: normal;
        }
    </style>
</head>

<body>

<script type="text/javascript">
    var RecaptchaOptions = {
        theme : 'clean'
    };
</script>

<fieldset id="link_form">
    <legend>Submit a new Link</legend>
    <div id="result"></div>
    <label for= "name">
        <span>Movie Name</span>
        <input type="text" name="name" id="name" placeholder="Movie name" autocomplete="off">
    </label>

    <label for = "link">
        <span>Movie Link</span>
        <input type="text" name="link" id="link" placeholder="Movie link" autocomplete="off">
    </label>

    <label for = "Host Site">
        <span>Host Site</span>
        <input type="text" name="host" id="host" placeholder="Host website name" autocomplete="off">
    </label>

    <?php
        require_once('recaptchalib.php');
        $publickey = "6LfR2vcSAAAAAKqEd2gA3Kc9m2vS-bINp9px0vp8";
        echo recaptcha_get_html($publickey);
    ?>

    <label>
        <span>&nbsp;</span>
        <button class="submit_btn" id="submit">Submit</button>
    </label>

</fieldset>

</body>
<script language="javascript" type="text/javascript" src="js/link_target.js"></script>
</html>
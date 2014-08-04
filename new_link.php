<html>
<head>
    <title>Add a New Movie</title>
    <link rel="stylesheet" type="text/css" href="css/input.css">
    <script src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {


        $(".search_btn").click(function() {

            var movie_name = $('input[name="name"]').val();

            var proceed_search = true;

            if (movie_name == "")
            {
                $('input[name=name]').css('border-color', 'red');
            }

            if (proceed_search)
            {
                post_search_data = {'name': movie_name};

                $.ajax ({
                    type: 'POST',
                    url: 'new_link_search.php',
                    data: post_search_data,
                    async: false,
                    success: function(res) {
                        if (res.type == 'error')
                        {
                            html_output = '<div class="error">' + res.text + '</div>';
                        } else {
                            html_output = '<div class="success">' + res.text + '</div>';
                        }

                        $("#search_result").hide().html(html_output).slideDown();

                    },
                    error: function (xhr, status, errorThrown) {
                        console.log(xhr);
                    },
                    dataType:"json"
                });

            }

        });




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

        $("#movie_select input").keyup(function() {
            $("#search_result").slideUp();
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

    <style type="text/css">

        #movie_select {
            display: block;
            width: 520px;
            height: 250px;
            margin: 0 auto;
            /*font-family: Arial, Helvetica, sans-serif;*/
            font-family:Verdana;
            font-weight: normal!important;
            font-size: 11px;
        }

        #search_form input {
            float: left;
        }

    </style>


</head>

<body>

<script type="text/javascript">
    var RecaptchaOptions = {
        theme : 'clean'
    };
</script>


<div id="movie_select">
    <div class="search_form">
    <label for= "name">
        <span>Movie Name</span>
        <input type="text" name="name" id="name" placeholder="Movie name" autocomplete="off">
    </label>
    <label>
        <span>&nbsp;</span>
        <button class="search_btn" id="search">Search</button>
    </label>
    </div>

    <div id="search_result">

    </div>
</div>


<fieldset id="link_form">
    <legend>Submit a new Link</legend>
    <div id="result"></div>

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
        //$publickey = "6LeO7PcSAAAAAMOPlpYG8vUl0RFE612VYiTr-G5L";

        echo recaptcha_get_html($publickey);
    ?>

    <label>
        <span>&nbsp;</span>
        <button class="submit_btn" id="submit">Submit</button>
    </label>

</fieldset>

</body>
<script language="javascript" type="text/javascript" src="js/link_target.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-53458532-1', 'auto');
    ga('send', 'pageview');

</script>
</html>
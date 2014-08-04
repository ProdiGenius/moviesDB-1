<html>
<head>
    <title>Add a New Movie</title>
    <link rel="stylesheet" type="text/css" href="css/input.css">
    <link rel="stylesheet" type="text/css" href="css/search.css" media="screen" />
    <script src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {


        $(".search_btn").click(function() {

            var movie_name = $('input[name="name"]').val();

            var proceed_search = true;

            if (movie_name == "")
            {
                $('input[name=name]').css('border-color', 'red');
                proceed_search = false;
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
            var quality = $("#quality").val();

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
            if (!quality)
            {
                alert("select is empty");
            }

            if (proceed) {
                post_data = {'name': name, 'link': link, 'quality': quality, 'challengeField': challengeField, 'responseField': responseField};

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
            $("#link_form input").css('border-color', '');
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
        #navContainer {
            margin: 0 auto;
            width: 1140px;
            height: 40px;
            z-index: 7;
            background-color: #36a2d2;
            font-family:Verdana;
            font-size: 15px;
        }

        #Home{
            display: inline-block;
            height:40px;
            width:90px;
            z-index:7;
            text-align:center;
            font-weight:bold;
            padding-top:17px;
            font-weight: normal;
        }

        #navContainer p {
            color: white;
        }

        #navContainer a{
            color:white;
        }
        #Home:hover a{
            color: #E1A304;
        }
        #Home:hover{
            background-color: white;
            color: #E1A304;
        }

        .dataTableContainer {
            margin: 10px 0;
        }

        /* TEMP^ */
        #header{
            position: fixed;
            z-index: 7;
            width: 100%;
            height: 55px;
            padding: 0px;
            top:0px;
            background-color: #36a2d2;
            opacity: 1;
            background-image: none;
        }
    </style>

</head>

<body>

<script type="text/javascript">
    var RecaptchaOptions = {
        theme : 'clean'
    };
</script>

<div id="header">

    <div id="navContainer">

        <div id="Home"><a href="http://www.watchitfree.me" style="text-decoration:none;">HOME</a></div>

        <div id="Home"><a href="new_link.php" style="text-decoration:none;">LINKS</a></div>

        <div id="search">
            <div class="icon">
                <p>SEARCH:</p>
            </div>
            <input id="search" type="text" autocomplete="off">
            <ul id="results"></ul>
        </div>
    </div>

</div>


<fieldset id="link_form">

    <div id = "movie_select">
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

    <legend>Submit a new Link</legend>
    <div id="result"></div>

    <label for = "link">
        <span>Movie Link</span>
        <input type="text" name="link" id="link" placeholder="Movie link" autocomplete="off">
    </label>

    <label for = "Link Quality">
        <span>Link Quality</span>
        <select id="quality">
            <option value="DVD">DVD</option>
            <option value="TS">TS (Telesync)</option>
            <option value="CAM">CAM</option>
        </select>
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
<script src="js/search.js"></script>
<script language="javascript" type="text/javascript" src="js/link_target.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-53458532-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
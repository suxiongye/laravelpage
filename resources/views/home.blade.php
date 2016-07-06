<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PERSONAL PHOTOGRAPHY</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#about_content").hide();
            $("#contact_content").hide();

            $("#about").click(function () {
                $("#album_pic").hide();
                $('#contact_content').hide();
                $("#about_content").show();
            });

            $("#contact").click(function () {
                $("#album_pic").hide();
                $('#contact_content').show();
                $("#about_content").hide();
            });

            $("#album").mouseover(function(){
                $("#album_pic").show();
                $('#contact_content').hide();
                $("#about_content").hide();
            });
        });
    </script>
    <style>
        a:hover {
            text-decoration: none;
            color: black;
        }

        a {
            color: black;
        }
    </style>
</head>
<div id="title" style="margin: 10px 35px;text-align: left;font-family: 微软雅黑;">
    <h1>LIANJINYONG</h1>
</div>

<div style="margin: 30px 40px 30px ;list-style-type: none;font-family: 微软雅黑;">
    <b> <a href="#" id="about">ABOUT</a><br>
        <a href="#" id="contact">CONTACT</a></b>
</div>
<div id="content">
    <ul style="float: left;">
        @foreach ($albums as $album)
            <li style="margin: 20px 0;list-style-type: none;">
                <div class="title" id="album">
                    <a href="{{ url('album/'.$album->id) }}">
                        <h4>{{ $album->name }}</h4>
                    </a>
                </div>
                <div class="body">
                    <p>{{ $album->describe }}</p>
                </div>
            </li>
        @endforeach
    </ul>

    <div id="album_pic" style="float:left;margin-left: 100px;max-height: 450px;max-width: 50%;">
        <img src="http://o9laew41e.bkt.clouddn.com/Desert.jpg" style="width: 100%; height: 100%;">
    </div>
    <div id="about_content"
         style="float:left;margin-left: 150px; margin-top:60px;height: 450px;width: 600px;text-align: center;">
        <b>ABOUT</b><br>
        <b>练金泳，1994年出生于中国广东。</b><br>
        <b>Lian Jinyong, born in Guangdong, China, in 1994.</b><br>
        <b>Locate in paris.</b>
    </div>

    <div id="contact_content"
         style="float:left;margin-left: 150px; margin-top:60px;height: 450px;width: 600px;text-align: center;">
        <b>CONTACT</b><br>
        <b>E-mail: <a href="simone199997@hotmail.com">simone199997@hotmail.com</a></b><br>
        <b>facebook: <a href="https://www.facebook.com/">https://www.facebook.com/</a></b><br>
        <b>Ins:<a href="https://www.instagram.com/ginlian/">https://www.instagram.com/ginlian/</a></b>
    </div>
</div>
</body>
</html>

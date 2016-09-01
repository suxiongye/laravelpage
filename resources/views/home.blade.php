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
                $("#album_index").hide();
                $('#contact_content').hide();
                $("#about_content").show();
            });

            $("#contact").click(function () {
                $("#album_index").hide();
                $('#contact_content').show();
                $("#about_content").hide();
            });

            $("#album").mouseover(function () {
                $("#album_index").show();
                $('#contact_content').hide();
                $("#about_content").hide();
            });

            $("#album a").click(function () {
                alert($(this).attr('href'));
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

        #content_left {
            width: 20%;
            float: left;
        }

        #content_right {
            width: 80%;
            min-height: 200px;
            float: left;
            text-align: center;
        }

        #about_content {
            min-height: 200px;
        }

        #img_index {
            max-width: 140px;
        }

        .table tbody tr td {
            border: #FFFFFF;
        }

        .table tbody tr td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div id="title" style="margin: 10px 35px;text-align: left;font-family: 微软雅黑;">
    <h1><a href="{{url('/')}}">LIANJINYONG</a></h1>
</div>


<div id="content">
    <div id="content_left">
        <div style="margin: 30px 40px 30px ;list-style-type: none;font-family: 微软雅黑;">
            <h4><b><a href="#" id="about">ABOUT</a></b></h4>

            <h4><b><a href="#" id="contact">CONTACT</a></b></h4>
        </div>
        <ul style="float: left;">
            @foreach ($albums as $album)
                <li style="margin: 20px 0;list-style-type: none;">
                    <div class="title" id="album">
                        <a href="{{ url('album/ajax/'.$album->id) }}" id="album_photo">
                            <h4><b>{{ $album->name }}</h4>
                        </a>
                    </div>
                    <div class="body">
                        <p>{{ $album->describe }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div id="content_right">
        <div id="about_content">
            <h4><b>ABOUT</b></h4>

            <h4><b>练金泳，1994年出生于中国广东。</b></h4>

            <h4><b>Lian Jinyong, born in Guangdong, China, in 1994.</b></h4>

            <h4><b>Locate in paris.</b></h4>
        </div>

        <div id="contact_content">
            <h4><b>CONTACT</b><br></h4>

            <h4><b>E-mail: <a href="simone199997@hotmail.com">simone199997@hotmail.com</a></b></h4>

            <h4><b>facebook: <a href="https://www.facebook.com/">https://www.facebook.com/</a></b></h4>

            <h4><b>Ins:<a href="https://www.instagram.com/ginlian/">https://www.instagram.com/ginlian/</a></b></h4>
        </div>

        <div id="album_index">
            <table class="table">
                <tbody>
                <tr>
                    <td>
                        <img src="http://o9laew41e.bkt.clouddn.com/2016.jpg" id="img_index"/>

                        <h4>PHOTOGRAPHY 2016</h4>
                    </td>
                    <td>
                        <img src="http://o9laew41e.bkt.clouddn.com/2015I.jpg" id="img_index"/>

                        <h4>PHOTOGRAPHY 2015 I</h4>
                    </td>
                    <td>
                        <img src="http://o9laew41e.bkt.clouddn.com/2015II.jpg" id="img_index"/>

                        <h4>PHOTOGRAPHY 2015 II</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="http://o9laew41e.bkt.clouddn.com/2014.jpg" id="img_index"/>

                        <h4>PHOTOGRAPHY 2014</h4>
                    </td>
                    <td>
                        <img src="http://o9laew41e.bkt.clouddn.com/2013.jpg" id="img_index"/>

                        <h4>PHOTOGRAPHY 2013</h4>
                    </td>
                    <td>
                        <img src="http://o9laew41e.bkt.clouddn.com/2012.jpg" id="img_index"/>

                        <h4>PHOTOGRAPHY 2012</h4>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>

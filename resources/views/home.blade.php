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
            $("#album_detail").hide();
            $('#album_index').show();


            $("#about").click(function () {
                $("#album_index").hide();
                $('#contact_content').hide();
                $("#about_content").show();
                $("#album_detail").hide();
            });

            $("#contact").click(function () {
                $("#album_index").hide();
                $('#contact_content').show();
                $("#about_content").hide();
                $("#album_detail").hide();
            });

            $("#album").click(function () {
                $("#album_index").hide();
                $("#album_detail").show();
                $('#contact_content').hide();
                $("#about_content").hide();
            });

            $("#album a").click(function () {
                var album_id = $(this).find('input').val();
                $.ajax({
                    type: "GET",  //提交方式
                    dataType: "json",
                    url: "{{url('album/ajax/')}}" + "/" + album_id,//路径
                    success: function (result) {//返回数据根据结果进行相应的处理
                        var str = "";
                        $.each(result, function (i, item) {
                            if(i%2 == 0)
                            {
                                str += "<tr><td> <img src='"+item.url+"' id='img_result'/></td>";
                            }
                            else{
                                str += "<td> <img src='"+item.url+"' id='img_result'/></td></tr>";
                            }
                        });
                        if(result.length%2 != 0){
                            str += "</tr>";
                        }
                        window.document.getElementById("album_result").innerHTML = str;
                    }
                });
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
            position: fixed;
        }

        #content_right {
            width: 80%;
            min-height: 200px;
            float: right;
            text-align: center;
        }

        #about_content {
            min-height: 200px;
        }

        #img_result {
            max-width: 350px;
            height: auto;
        }

        .table tbody tr td {
            border: #FFFFFF;
        }

        .table tbody tr td {
            text-align: center;
            vertical-align: middle;
        }

        h5 {

        }
    </style>
</head>
<body>
<div id="title" style="margin: 10px 35px;text-align: left;font-family: 微软雅黑;">
    <h2><a href="{{url('/')}}">LIANJINYONG</a></h2>
</div>


<div id="content">
    <div id="content_left">
        <div style="margin: 30px 40px 30px ;list-style-type: none;font-family: 微软雅黑;">
            <h5><a href="#" id="about">ABOUT</a></h5>

            <h5><a href="#" id="contact">CONTACT</a></h5>
        </div>
        <ul style="float: left;">
            @foreach ($albums as $album)
                <li style="margin: 20px 0;list-style-type: none;">
                    <div class="title" id="album">
                        <a href="#" id="album_photo">
                            <input type="hidden" value="{{$album->id}}"/>
                            <h5>{{ $album->name }}</h5>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div id="content_right">
        <div id="about_content">
            <h4>ABOUT</h4>

            <h4>练金泳，1994年出生于中国广东。</h4>

            <h4>Lian Jinyong, born in Guangdong, China, in 1994.</h4>

            <h4>Locate in paris.</b></h4>
        </div>

        <div id="contact_content">
            <h4>CONTACT</h4>

            <h4>E-mail: <a href="simone199997@hotmail.com">simone199997@hotmail.com</a></h4>

            <h4>facebook: <a href="https://www.facebook.com/">https://www.facebook.com/</a></h4>

            <h4>Ins:<a href="https://www.instagram.com/ginlian/">https://www.instagram.com/ginlian/</a></h4>
        </div>

        <div id="album_index">
            <a href="http://o9laew41e.bkt.clouddn.com/2013.jpg"><img src="http://o9laew41e.bkt.clouddn.com/2013.jpg" id="img_index" style="max-width: 600px;height: auto;" alt="index_pic"/></a>
        </div>

        <div id="album_detail">
            <table class="table">
                <tbody id="album_result">

                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>

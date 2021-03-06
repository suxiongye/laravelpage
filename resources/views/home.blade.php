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
            $("#video_content").hide();
            $('#album_index').show();


            $("#about").click(function () {
                $("#album_index").hide();
                $('#contact_content').hide();
                $("#about_content").show();
                $("#video_content").hide();
                $("#album_detail").hide();
            });

            $("#contact").click(function () {
                $("#album_index").hide();
                $('#contact_content').show();
                $("#about_content").hide();
                $("#video_content").hide();
                $("#album_detail").hide();
            });

            $("#video").click(function () {
                $("#album_index").hide();
                $('#contact_content').hide();
                $("#about_content").hide();
                $("#video_content").show();
                $("#album_detail").hide();
            });

            $("#album").click(function () {
                $("#album_index").hide();
                $("#album_detail").show();
                $('#contact_content').hide();
                $("#video_content").hide();
                $("#about_content").hide();
            });

            $("#album a").click(function () {
                var album_id = $(this).find('input').val();
                $("#album_index").hide();
                $("#album_detail").show();
                $('#contact_content').hide();
                $("#video_content").hide();
                $("#about_content").hide();
                $.ajax({
                    type: "GET",  //提交方式
                    dataType: "json",
                    url: "{{url('album/ajax/')}}" + "/" + album_id,//路径
                    success: function (result) {//返回数据根据结果进行相应的处理
                        var str = "";
                        $.each(result, function (i, item) {
                            if(i%2 == 0)
                            {
                                str += "<tr><td> <a href='"+item.url+"'><img src='"+item.url+"' id='img_result'/></a></td>";
                            }
                            else{
                                str += "<td><a href='"+item.url+"'><img src='"+item.url+"' id='img_result'/></a></td></tr>";
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
            margin-top: 150px;
        }
        #contact_content {
            min-height: 200px;
            margin-top: 150px;
        }
        #video_content {
            min-height: 200px;
            margin-top: 150px;
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
        <div style="margin: 30px 40px 30px ;list-style-type: none;font-family: 微软雅黑;">
            <h5><a href="#" id="video">VIDEO</a></h5>
        </div>
    </div>
    <div id="content_right">
        <div id="video_content">
            <h4>VIDEO</h4>
            <h4>纪录片《invisible》拍摄于2016年。</h4>
            <h4>Diamentino Quintas —— 传统胶片洗印师。</h4>
            <h4>由其负责完成洗印的已故摄影师Gilles Garon摄影作品近期在巴黎网球场博物馆Soulèvement展览展出。</h4>
            <h4>视频链接 <a href="https://www.youtube.com/watch?v=MY2pslVRluU" target="_blank">https://www.youtube.com/watch?v=MY2pslVRluU</a></h4>
        </div>


        <div id="about_content">
            <h4>ABOUT</h4>

            <h4>练金泳，1994年出生于中国广东。</h4>

            <h4>Lian Jinyong, born in Guangdong, China, in 1994.</h4>

            <h4>Photographer of fine art and fashion locate in paris.</h4>
        </div>

        <div id="contact_content">
            <h4>CONTACT</h4>

            <h4>E-mail: <a href="simone199997@hotmail.com">simone199997@hotmail.com</a></h4>

            <h4>facebook: <a href="https://www.facebook.com/">https://www.facebook.com/</a></h4>

            <h4>Ins:<a href="https://www.instagram.com/ginlian/">https://www.instagram.com/ginlian/</a></h4>
        </div>

        <div id="album_index">
            <a href="http://o9laew41e.bkt.clouddn.com/index_new.png"><img src="http://o9laew41e.bkt.clouddn.com/index_new.png" id="img_index" style="max-width: 600px;height: auto;" alt="index_pic"/></a>
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

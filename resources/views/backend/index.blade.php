@extends('backend/dashboard')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <?php
            //如果距离到期日期很近了，会弹窗提示续费，并且进度条变成红色
            $startDate = substr($conf->startDate, 0, 10);//上线日期
            $stopDate = substr($conf->stopDate, 0, 10);//到期日期
            $rate = (int)((time()-strtotime($startDate))/(strtotime($stopDate)-strtotime($startDate))*100);
            if ($rate >= 95) {
                echo "<script>alert('您的网站即将于{{$stopDate}}到期，请尽快联系开发商续费')</script>";
            }
        ?>
        <section class="panel">
            <header class="panel-heading">
                服务器有效期
            </header>
            <div class="panel-body">
                <div class="progress progress-striped active progress-lg">
                    <div class="progress-bar <?php if ($rate <= 90){?>progress-bar-success<?} else {?>progress-bar-danger<?php }?>"  role="progressbar" aria-valuenow="{{$rate}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$rate}}%">
                        <span class="sr-only">{{$rate}}% Complete</span>
                    </div>
                </div>
                <span>开始时间：{{$startDate}}</span>
                <span class="pull-right">到期时间：{{$stopDate}}</span>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading" style="border-bottom:none">
                网站信息
            </header>
            <table class="table table-striped table-advance table-hover">
                <tr>
                    <td class="col-sm-1 text-center">程序版本</td>
                    <td>V1.0</td>
                </tr>
                <tr>
                    <td class="col-sm-1 text-center">Server</td>
                    <td>{{$_SERVER['SERVER_SOFTWARE']}}</td>
                </tr>
                <tr>
                    <td class="col-sm-1 text-center">Mysql</td>
                    <td>5.6</td>
                </tr>
                <tr>
                    <td class="col-sm-1 text-center">PHP</td>
                    <td>{{PHP_VERSION}}</td>
                </tr>
                <tr>
                    <td class="col-sm-1 text-center">服务器时间</td>
                    <td>{{date('Y-m-d H:i:s')}}</td>
                </tr>
            </table>
        </section>
        <section class="panel">
            <header class="panel-heading">
                使用手册
            </header>
            <div class="panel-body">
                <p>1、本系统由bootstrap框架开发，请使用<span style="color:red">“高级”</span>浏览器进行操作！<a href="http://www.google.cn/chrome/browser/desktop/index.html" target="_blank">>>点击下载Chrome浏览器</a></p>
                <p>2、上传图片时，进度条跑满100%后没有立即看到图片，请稍等几秒，因为请求新上传的图片需要一点网络传输时间。</p>
                <p>3、视频地址填写flash的地址即可，如 <span style="color:red">http://player.youku.com/player.php/sid/XMTYxMzU5MzAzNg==/v.swf</span></p>
                <p>4、对分类进行操作时尽量使用修改而不是删除，因为导航栏和底部链接都是指向某个分类的。</p>
                <p>5、上传图片时，尽量调整图片的长宽像素比为1:1，使得展示的图片高度一致。</p>
            </div>
        </section>
    </div>
</div>
@stop

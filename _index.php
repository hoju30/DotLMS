<?php
  include('_nav.php');
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('.container');

        images.forEach(image => {
            image.addEventListener('click', function() {
                this.classList.toggle('show');
            });
        });
    });
</script>

</head>

<body>
    <div class="wrapper">
        <main>
            <div class="book">
                <div class="container">
                    <img src="img/dot2.png" alt="書本1" class="image" style="width:100%">
                    <div class="middle">
                        <div class="text">
                            <h2 style="text-align: center;">基本觀念 </h2><br>
                            <p>左邊三個點上到下1~3</p><br>
                            <p>右邊三個點上到下4~6</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="book">
                <div class="container">
                    <img src="img/dot1.png" alt="書本2" class="image" style="width:100%;height: 300px;">
                    <div class="middle">
                        <div class="text">
                            <h2 style="text-align: center;">英文點字對照表</h2><br>
                            <p> a: ⠁
                                b: ⠃
                                c: ⠉
                                d: ⠙
                                e: ⠑
                                f: ⠋
                                g: ⠛
                                h: ⠓
                                i: ⠊
                                j: ⠚
                                k: ⠅
                                l: ⠇
                                m: ⠍
                                n: ⠝
                                o: ⠕
                                p: ⠏
                                q: ⠟
                                r: ⠗
                                s: ⠎
                                t: ⠞
                                u: ⠥
                                v: ⠧
                                w: ⠺
                                x: ⠭
                                y: ⠽
                                z: ⠵
                                space: ⠀
                                ?: ⣿
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer>

    <br>
            <p style="text-align: center;color: white;">

            聯絡我們:Email: &nbsp;dot.learning@gmail.com<br>
                <br>
                Mobile:&nbsp;&nbsp;+886 929******<br>
            </p>
        </footer>
    </div>
</body>

</html>
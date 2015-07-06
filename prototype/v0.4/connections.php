<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include 'backend/DB_CN.php';
        include 'backend/helper.php';
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Шилэн Нам</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Css -->
        <link rel="stylesheet" href="css/global.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <header>
            <?php
            include "templates/header.php";
            ?>
        </header>

        <div class="row-connections">
            <div class="container">
                <div class="some-links" id="connection">
                    <div class="jumbotron">
                        <h2 class="text-center">
                            Холбоосууд
                        </h2>
                    </div>

                    <div class="some-links-in-cont">
                        <blockquote>
                            <a target="_blank" href="http://forum.mn/index.php?sel=project&menu_id=394&obj_id=5001">Улс төрийн намуудын ил тод байдал инфографиз</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://forum.mn/index.php?sel=project&menu_id=394&obj_id=5002">Намуудын санхүүжилтийн талаар олон нийтийн санал бодлын судалгаа, Сант Маргад, 2015</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://forum.mn/index.php?sel=project&menu_id=394&obj_id=5003">Улс төрийн намуудын бүтэц, зохион байгуулалтын шинжилгээ, С.Мөнхбат, 2015</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://forum.mn/index.php?sel=project&menu_id=394&obj_id=5011">Улс төрийн намууд шилэн болж чадах уу, Л.Номин, Ардчилал сонин, 2015</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://forum.mn/res_mat/2015/Bodlogiin_asuudal_tsuvral_XV-b.pdf">Улс төрд мөнгөний нөлөө, Бодлогын судалгаа </a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://forum.mn/res_mat/2015/Bodlogiin_asuudal_tsuvral_XVI%20Battuul_Final.pdf">Улс төрийн намд өгч буй хандивын зарим асуудлууд, Б.Баттуул, Бодлогын судалгаа</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://jargalmsue.blogspot.com/2014/04/blog-post.html">АНУ дахь улс төрийн намын санхүүжилт – Жаргал, МУБИС</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://politics.news.mn/content/200876.shtml">Улс төрийн намуудыг “Шилэн” болгоё, Ш.Отгонсүрэн</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://bpurevdagva.blogspot.com/2011/04/blog-post_20.html">Монголын улс төрийн намуудын төлөвшлийн зарим асуудал</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://wap.eagle.mn/mcontent/read/23819.htm;jsessionid=C7EC98A05617BDEE3A485FA1666B17B5">Намуудын тэн хагас нь татан буугдах нь</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="https://prezi.com/-dxmel4mfof3/44/">Улс төрийн намын тухай хууль прези</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="https://prezi.com/xmag6c7mmmnw/presentation/">Цэлмэг, Улс төрийн намууд прези</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://archive.olloo.mn/modules.php?name=News&file=print&sid=1242668">Хулхи ориг 2оо нэгтгээч</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://www.bolod.mn/modules.php?name=News&nID=71428">Л.Гүндалай: Ард түмний нам усан дахь хөөс шиг замхраад алга болчихсон</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://www.forum.mn/index.php?sel=news&obj_id=2120">намуудын жагсаалт</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://www.ulstur.mn/?p=28253">намуудыг төрөөс санхүүжүүлэх шаардлагатай юу</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="https://tusuv.wordpress.com/category/%D1%83%D0%BB%D1%81-%D1%82%D3%A9%D1%80%D0%B8%D0%B9%D0%BD-%D0%BD%D0%B0%D0%BC%D1%83%D1%83%D0%B4%D0%B0%D0%B4-%D1%82%D3%A9%D1%81%D0%B2%D3%A9%D3%A9%D1%81-%D0%BE%D0%BB%D0%B3%D0%BE%D0%B4%D0%BE%D0%B3-%D0%BC/">УИХ-д суудалтай намуудад улсын төсвөөс олгосон дэмжлэг. 2005 – 2012 он</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://www.assa.mn/content/30457.shtml">НАМУУДЫГ ТӨСВӨӨС САНХҮҮЖҮҮЛНЭ, ХАРИН ХАРИУЦЛАГАТАЙ АЖИЛЛА</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://www.assa.mn/content/7764.shtml?alias=politics">НАМУУДЫН САНХҮҮЖИЛТ УЛСЫН ТӨСВӨӨС ГАРВАЛ...</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://www.shuum.mn/news/newsid/21371/catid/2">Р.Бурмаа: Намыг төсвөөс санхүүжүүлэх бол хяналт хэрэгтэй</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://archive.olloo.mn/modules.php?name=News&file=article&sid=1214626">Намуудыг төсвөөс санхүүжүүлбэл авлига багасах болов уу</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://jargaldefacto.com/%D0%BD%D0%B0%D0%BC%D1%83%D1%83%D0%B4%D1%8B%D0%BD-%D0%BD%D1%83%D1%83%D1%86-%D1%8D%D0%B7%D1%8D%D0%B4-%D1%85%D1%8D%D0%BD-%D0%B1%D1%8D/">Намуудын нууц эзэд хэн бэ?</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://niitlelchid.mn/2015/04/27/261/">Мөнгөнд дарлуулсан намууд</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://www.ulstur.mn/?p=26357">Улс төрийн намууд хэдийг залгидаг вэ?</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://mobile.news.mn/mcontent/169287.shtml?s=parliament">"Улс төрийн нам, улстөрчдөд өгч байгаа хандивыг ил тод болгох ёстой"</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://aagii_0620.blog.gogo.mn/?date=2014-04">С.Алтантулгын нийтлэлүүд</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://www.civilwillgreen.mn/page/news/72">УТЗ-ЫН ГИШҮҮД НАМ ӨМЧГҮЙ БАЙХ ЁСТОЙ ГЭЖ ҮЗЭВ</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://www.opensocietyforum.mn/res_mat/Report_TamirCampignMeeting_mong.pdf">Улс төрийн намыг санхүүжилт ба хандивлагчид</a>
                        </blockquote>

                        <blockquote>
                            <a target="_blank" href="http://www.new.mn/News/Detail?news_code=32113">Улс төрийн намууд хаанаас санхүүждэг вэ</a>
                        </blockquote>
                    </div>
                    
                </div>
            </div>
        </div>


        <footer class="footer navbar navbar-fixed-bottom">
            <?php
            include "templates/footer.php";
            ?>
        </footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.11.2.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Custom Global Javascript and Jquery -->
        <script src="js/global.js"></script>
    </body>
</html>
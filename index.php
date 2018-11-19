<!DOCTYPE html>
<html>
    <?php
    include "topo.php"; //topo da pagina
    ?>


    <head>

        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>Pagina Incial - Ave Verde</title>
        <!-- <link rel ="stylesheet" href ="css/estilos.css" type = "text/css" media = "all"/>
         <link href="styles.hort.css" rel="stylesheet" type="text/css" media="all" />-->


        <style>
            .slide{
                height:  calc(rem);
                width: 100%;
                min-height: 10px;

            }
            #teste{
                border:1px solid;
            }
            .headerfeiras{
                float: right;
                width: 70%;
            }
             .headerfeiras h1{
               color: #29804c;
            }
            .lista_produtos{
                display: inline;
                border: 1px solid;
            }
              .produtos{
       width: 100%; 
       margin: 0 auto;
    }
    .imagem{
        width: 100%;
    }
    .produtos ul{
        list-style: none;
	
    }
    .produtos ul li{
        display: inline; 
        width: 105px; 
        float: left;
		margin-left: 10px;
        
        
    }
            

        </style>

    </head>

    <body>
        <!-- Inicia conteudo-->

        <div id="featured" class="conteudo"><br>
            <!-- slide em java script-->
            <script>
                var i = 0; // Start point
                var images = [];
                var time = 1500;

                // Image List
                images[0] = 'images/slide/img1.jpg';
                images[1] = 'images/slide/img2.jpg';
                images[2] = 'images/slide/img3.jpg';
                images[3] = 'images/slide/img4.jpg';

                // Change Image
                function changeImg() {

                    document.slide.src = images[i];

                    if (i < images.length - 1) {
                        i++;
                    } else {
                        i = 0;
                    }

                    setTimeout("changeImg()", time);
                }

                window.onload = changeImg;

            </script>
            <!-- TERMINA CODIGO JAVA SCRIPT SLIDE-->

            <div class="slide">
                <img name="slide" width="1000" height="200" class="slide">
                <script type="text/javascript" src="badufpi/css/java.js"></script></div>
            <!--<a id="prev" href="#">&#8810;</a>
            <a id="next" href="#">&#8811;</a>-->
            <div id="featured" class="produtos"><br>
                        <div class ="lista_produtos">
                    
                            <?php
                            include "banco.php";
                             echo "<ul>";
                              $sql = "SELECT produtos.id, produtos.nomeproduto, produtos.imagem, produtos.preco, produtores.produtor,fk_produtor FROM produtos INNER JOIN produtores ON produtos.fk_produtor=produtores.id;";
                              //$sql = "SELECT * FROM produtos ORDER BY nomeproduto;"; // cria-se uma string de consulta SQL
                              $qr = mysql_query($sql) or die(mysql_error());
                              while ($ln = mysql_fetch_assoc($qr)) {
                              
                              echo '<img src="admin/produtos/' . $ln['imagem'] . '" width = "100" height = "100"/>';
                             /*echo '<li><h4>' . $ln['nomeproduto'] . '</h4></br></li>';
                                echo 'R$ ' . number_format($ln['preco'], 2, ',', '.') . '';
                              echo '<a href="carrinho.php?acao=add&id=' . $ln['id'] . '">RESERVAR</a>';*/
                              //echo '<br /> <hr />';
                              }
                              echo "</ul>"
                           
                            ?> 

                            </div>

                            </div>

                          
                                <form>

                                    <br>
                                    <div class="linhasocial"></div>
                                    <hr>
                                    <br>
                                    <!--
                                    <div class = "face">
                                        <div class="facebook-pane" id="fb-root"></div>
                                        <div class="instagram-pane" id="insta-root"></div>
                                        <div class="outstanding-headerface">				
                                            <h2 class="outstanding-titleface">Facebook</h2>
                                        </div>
    
                                    </div>
                                    
                                    <div id="fb-root"></div>
                                    <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2';
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
    
                                    <div class="fb-page" data-href="https://www.facebook.com/joheluanoficial" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/joheluanoficial" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/joheluanoficial">Jôh e Luan</a></blockquote></div>
                                    -->



                                    <!-- instagram -->
                                    <!-- InstaWidget -->
                                    <div class="instagram-pane" id="insta-root"></div>
                                    <div class="outstanding-header">				
                                        <h2 class="outstanding-title">Instagram</h2>

                                    </div>
                                    <a href="https://instawidget.net/v/user/povoadoaveverde" id="link-4c494f56ce20ce918dd68000ecbe90ef35523044ee58ac476935a7f9d633158c">@povoadoaveverde</a>
                                    <script src="https://instawidget.net/js/instawidget.js?u=4c494f56ce20ce918dd68000ecbe90ef35523044ee58ac476935a7f9d633158c&width=300px"></script>



                                    <div class="headerfeiras">
                                        



                                        <?php
                                        include "banco.php";

                                        echo "<ul>";

                                        $sql = "SELECT * FROM feiras WHERE DATA = (SELECT MAX(DATA) FROM feiras);";
                                        //$sql = "SELECT * FROM produtos ORDER BY nomeproduto;"; // cria-se uma string de consulta SQL
                                        $sql = mysql_query($sql) or die(mysql_error());
                                        while ($linha = mysql_fetch_assoc($sql)) {
                                            echo '<h1>' . $linha['feira'] . '</h1> <br />';
                                            echo '<p id="descricao">' . $linha['descricao'] . '</p> <br />';
                                            //echo 'R$ '.number_format($ln['preco'],2,',','.').'';
                                            echo '<li><img src="admin/images/feiras/' . $linha['imagem'] . '" width = "350 height = "350"/></li>';
                                            echo '<a href="listar_feiras.php"><p>' . $linha['feira'] . '</p><a/>';


                                            //echo '<a href="carrinho.php?acao=add&id='.$ln['id'].'">RESERVAR</a>';
                                            //echo '<br /> <hr />';
                                        }
                                        echo "</ul>";
                                        ?>
                                    </div>


                                </form>






                                <!-- fin do  conteudo-->

                                <br> <hr><br>




                                </body>
                                </html>


<?php
session_start();
require 'header.php';
?>   
        <!-- COVER PICTURE -->
        <img id="cover" src="images/cover4.jpg"/>
        <br />
        <br />

        <!-- MAIN CONTENT -->
        <table style="width:100%;">
            <tr>
                <!-- 1ST COLUMN -->
                <td style="width:28%; padding-right:10px; vertical-align:top;">
                    <!-- CENTRIA -->
                    <table style="width:100%;">
                        <tr>
                            <td style="background-color:black; color:white; padding-left:10px; font-family:Cambria; font-size:12px; font-weight:600; padding-top:4px; padding-bottom:4px;">CENTRIA UAS, Finland</td>
                        </tr>
                        <tr>
                            <td><img src="images/building.jpg" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td>
                                <?php 
                                $query = "SELECT * FROM about";
                                $r = mysql_query($query);
                                while($row = mysql_fetch_array($r)){
                                    print '<a class="link" href="about.php?id='.$row['id'].'">'.$row['title'].' »</a><br />';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>

                    <br />
                    <br />

                    <!-- STUDYING -->
                    <table style="width:100%;">
                        <tr>
                            <td style="background-color:black; color:white; padding-left:10px; font-family:Cambria; font-size:12px; font-weight:600; padding-top:4px; padding-bottom:4px;">STUDYING</td>
                        </tr>
                        <tr>
                            <td><img src="images/studying.jpg" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td>
                                <?php 
                                $query = "SELECT * FROM studying";
                                $r = mysql_query($query);
                                while($row = mysql_fetch_array($r)){
                                    print '<a class="link" href="about.php?id='.$row['id'].'">'.$row['title'].' »</a><br />';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                    <br />
                    <br />

                    <!-- SERVICES -->
                    <table style="width:100%;">
                        <tr>
                            <td style="background-color:black; color:white; padding-left:10px; font-family:Cambria; font-size:12px; font-weight:600; padding-top:4px; padding-bottom:4px;">SERVICES</td>
                        </tr>
                        <tr>
                            <td><img src="images/services.jpg" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td>
                                <a class="link" href="http://web.centria.fi/Page.aspx?id=2101&p1=68&p2=2101">Student affairs offices »</a><br />
                                <a class="link" href="http://web.centria.fi/Page.aspx?id=1969&p1=66&p2=1968">Library services »</a><br />
                                <a class="link" href="http://web.centria.fi/Page.aspx?id=1866&p1=68&p2=1866">Central »</a><br />
                                <a class="link" href="http://web.centria.fi/Page.aspx?id=2040&p1=68&p2=2040">Diploma Supplement »</a><br />
                            </td>
                        </tr>
                    </table>

                    <br /><br />

                    <!-- EXPLORE -->
                    <table style="width:100%;">
                        <tr>
                            <td style="background-color:black; color:white; padding-left:10px; font-family:Cambria; font-size:12px; font-weight:600; padding-top:4px; padding-bottom:4px;">EXPLORE</td>
                        </tr>
                        <tr>
                            <td><img src="images/explore.jpg" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td>
                                <a class="link" href="https://www.kokkola.fi/">Kokkola »</a><br />
                                <a class="link" href="http://www.pietarsaari.fi/">Pietasaari »</a><br />
                                <a class="link" href="http://www.ylivieska.fi/index.asp">Ylivieska »</a><br />
                                <a class="link" href="http://www.visitfinland.com/">Visit to Finland »</a><br />
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- 2ND COLUMN -->
                <td style="width: 50%; border-left: solid 2px #808080; border-right: solid 2px #808080; vertical-align:0px; padding-left:10px; padding-right:10px;">
                    <!-- READ ME FIRST -->
            <table style="width:100%;">
                <tr>
                    <td style="background-color:#61a52f; color:white; padding-left:10px; font-family:Cambria; font-size:14px; font-weight:600; padding-top:4px; padding-bottom:4px;">READ ME FIRST!</td>
                </tr>
                <tr>
                    <td style="height:80px; padding-left:3%; padding-right:3%; text-align:justify;">
                        <h2>Tervetuloa to our project!</h2>
                        <img src="images/web_banner.png" width="70%" style="padding-right:3%;"/><br /><br />
                        <div style="font-family:Calibri; font-size:14px; color:#6b4848; text-align:justify;">
                            We are making this project in WWW-programming course. <b><i>In this website</i></b>, we use HTML, PSP, JavaScript, and CSS together.<br /><br />
                            <i><b>An anonymous user</b></i>, can use this web-site with the read-only permissions. If a person want to reserve the 
                            internship job, <b>please SIGN - IN/ Register</b> to our website.<br /><br />                                        
                        </div>
                        <table style="border-bottom:1px dotted black; width:100%;">
                            <tr>
                                <td style="width:10px;"></td>
                                <td><a style="color:blue;" href="about.php?id=6">Continue reading »</a></td>
                            </tr>
                        </table><br />
                    </td>
                    
                </tr>
            </table>
                    <!-- NEWS -->
                    <table style="width:100%;">
                        <tr>
                            <td style="background-color:#61a52f; color:white; padding-left:10px; font-family:Cambria; font-size:14px; font-weight:600; padding-top:4px; padding-bottom:4px;">NEWS</td>
                        </tr>
                        <tr>
                            <td style="height:80px;">
                                <?php 
                                $query = "SELECT * FROM news";
                                $r = mysql_query($query);
                                $i = 0;
                                while($row = mysql_fetch_array($r)){
                                    print '
                                    <table style="border-bottom:1px dotted black; width:100%;">
                                    <tr>
                                        <td style="padding-bottom:10px;"><span class="date">'.$row['date_entered'].'</span><br /></td>
                                    </tr>
                                    <tr>';
                                        if (empty($row['pic'])) print '<td width="30%"></td>';
                                        else print '<td width="30%"><img src="images/uploads/'.$row['pic'].'" style="width:80px;"/></td>';
                                        print '<td><a class="font_news" href="show_news.php?id='.$row['id'].'">'.$row['title'].' »</a></td>
                                    </tr>
                                    </table>';
                                    
                                    $i++;
                                    if($i==3) break;
                                }
                                ?>              
                                
                                <table style="border-bottom:1px dotted black; width:100%;">
                                    <tr>
                                        <td style="width:10px;"></td>
                                        <td><a style="color:blue;" href="show_news.php">All news »</a></td>
                                    </tr>
                                </table><br />                                                  
                                
                            </td>
                        </tr>
                    </table>

                    <!-- EVENTS  -->
                    <table style="width:100%;">
                        <tr>
                            <td style="background-color:#61a52f; color:white; padding-left:10px; font-family:Cambria; font-size:14px; font-weight:600; padding-top:4px; padding-bottom:4px;">EVENTS</td>
                        </tr>
                        <tr>
                            <td style="height:80px;">
                                <?php 
                                $query = "SELECT * FROM events";
                                $r = mysql_query($query);
                                $i = 0;
                                while($row = mysql_fetch_array($r)){
                                    print '
                                    <table style="border-bottom:1px dotted black; width:100%;">
                                    <tr>
                                        <td style="padding-bottom:10px;"><span class="date">'.$row['date_entered'].'</span><br /></td>
                                    </tr>
                                    <tr>';
                                    if (empty($row['pic'])) print '<td width="30%"></td>';
                                    else print '<td width="30%"><img src="images/uploads/'.$row['pic'].'" style="width:80px;"/></td>';
                                    print '<td><a class="font_news" href="show_news.php?id='.$row['id'].'">'.$row['title'].' »</a></td>
                                    </tr>
                                    </table>';
                                    
                                    $i++;
                                    if($i==3) break;
                                }
                                ?>     

                                <table style="border-bottom:1px dotted black; width:100%;">
                                    <tr>
                                        <td style="width:10px;"></td>
                                        <td><a style="color:blue;" href="show_events.php">All events »</a></td>
                                    </tr>
                                </table><br />                                                      
                                
                            </td>
                        </tr>
                    </table>

                    <!-- VIDEO -->
                    <table style="width:100%;">
                        <tr>
                            <td style="background-color: #c53928; color: white; padding-left: 10px; font-family: Cambria; font-size: 15px; font-weight: 600; padding-top: 4px; padding-bottom: 4px; vertical-align:middle;"><img style="width:16px;" src="images/youtube.png"/><span style="padding-left:10px; margin-bottom:5px;">VIDEOS</span></td>
                        </tr>
                        <tr>
                            <td style="height:80px;">
                                <br />
                                <iframe style="width:100%; height:250px;" src="http://www.youtube.com/embed/aJqM7ElWM3g?list=UUzr6nbgNOVaBkkDlcvvsiaw" frameborder="0" allowfullscreen></iframe>
                                <br /><br />
                                <table style="border-bottom:1px dotted black; width:100%; border-top:1px dotted black">
                                    <tr>
                                        <td style="width:10px;"></td>
                                        <td><a style="color:blue;" href="http://www.youtube.com/user/HaeEnnenKuin?feature=watch">Centria YouTube's channel »</a></td>
                                    </tr>
                                </table><br />                 
                            </td>
                        </tr>
                    </table>
                    <br />

                    <!-- @CENTRIAAMK -->
                    <table style="width:100%;">
                        <tr>
                            <td style="background-color:#46c3d1; color:white; padding-left:10px; font-family:Cambria; font-size:15px; font-weight:600; padding-top:4px; padding-bottom:4px;"><img style="width:16px;" src="images/twitter.png"/><span style="padding-left:10px;">@CENTRIAAMK</span></td>
                        </tr>
                        <tr>
                            <td style="height:80px;">
                                <br />
                                <!-- <iframe src="https://fi-fi.facebook.com/centriaamk" style="width:100%; height:300px;"></iframe> -->
                                <a class="twitter-timeline" href="https://twitter.com/centriaamk" data-widget-id="406162684275482624">Tweets by @centriaamk</a>
                                <script>!function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https'; if (!d.getElementById(id)) { js = d.createElement(s); js.id = id; js.src = p + "://platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs); } }(document, "script", "twitter-wjs");</script>

                                <br /><br />
                                <table style="border-bottom:1px dotted black; width:100%; border-top:1px dotted black">
                                    <tr>
                                        <td style="width:10px;"></td>
                                        <td><a style="color:blue;" href="https://twitter.com/centriaamk">Go to Twitter »</a></td>
                                    </tr>
                                </table><br />                 
                            </td>
                        </tr>
                    </table>
                </td>
                <!-- https://dev.twitter.com/discussions/4001 -->
                <!-- 3RD COLUMN -->
                <td style="padding-left:10px; vertical-align:top;">
                    <a href="http://www.jobsforeveryone.in/top-job-sites-in-finland/" target="_blank"><img src="images/ads/job.jpg" style="width:100%" /></a>
                    <br /><br /><br /><br /><br />
                    <a href="https://colibri.amkit.fi/" target="_blank"><img src="images/ads/centria_lib.gif" style="width:100%" /></a>
                    <br /><br /><br /><br /><br />
                    <a href="https://www.kokkola.fi/matkailu_2/en_GB/loyda_kokkola/" target="_blank"><img src="images/ads/kokkola.jpg" style="width:100%" /></a>
                    
                </td>
            </tr>
        </table>
        <br /><br />

 <?php 
  require 'footer.php';
 ?>
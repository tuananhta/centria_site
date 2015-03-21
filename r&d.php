<?php
session_start();
define ('TITLE','Research & Development');
	require 'header.php';
?>   

<img id="cover" src="images/cover11.jpg"/>
        <br />
        <br />
        <!-- MAIN CONTENT -->
        <table style="width:100%;">
            <tr>
                <!-- 1ST COLUMN -->
                <td style="width:25%; padding-right:10px; vertical-align:top;">
                    <img src="images/centria.jpg" width="90%"/><br /><br />
                    <!-- r&d -->
                    <table style="width:100%;">
                        <tr>
                            <td class="background_title2" style="font-size:20px; font-weight:600;padding-left:15px; padding-top:7px; padding-bottom:7px;">RESEARCH & DEVELOPMENT</td>
                        </tr>

                        <tr>
                            <td>
                                <br />
                                <?php 
                                $query = "SELECT * FROM r_and_d";
                                $r = mysql_query($query);
                                while($row = mysql_fetch_array($r)){
                                    print '<a class="link2" href="r&d.php?id='.$row['id'].'"><b>></b> '.$row['title'].' </a><br />';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>

                    <br />
                    <br />
                </td>

                <!-- 2ND COLUMN -->
                <td style="width: 50%; border-left: solid 2px #808080; border-right: solid 2px #808080; vertical-align:0px; padding-left:10px; padding-right:10px;">
                    
                    <!-- NEWS -->
                    <table style="width:100%;">
                        <?php
                        $id = $_GET['id'];
                        $query = "SELECT * FROM r_and_d WHERE id={$id}";
                        $r = mysql_query($query);
                        $row = mysql_fetch_array($r);
                        
                        print '
                            <tr>
                                <td class="background_title" style="font-size:20px; font-weight:600;padding-left:20px; padding-top:7px; padding-bottom:7px;">'.$row['title'].'</td>
                            </tr>';
                        if(empty($row['pic'])){
                            print'
                            <tr>
                                <td class="title_style"><br /><br />'.$row['context'].'</td>
                            </tr>
                        ';
                        }
                        else {
                            print '
                            <tr>
                                <td>
                                    <table style="width:100%;">
                                        <tr>
                                            <td style="width:30%"><img src="images/uploads/'.$row['pic'].'" style="width:95%" /></td>
                                            <td class="title_style"><br /><br />'.nl2br($row['context']).'</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            ';
                        }
                        ?>
                        
                    </table>

                </td>
            </tr>
        </table>
        <br /><br />

 <?php 
	require 'footer.php';
 ?>
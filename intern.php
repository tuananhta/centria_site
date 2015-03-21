<?php
  session_start();
define ('TITLE', 'Centria Internship');
require 'header.php';
?>   
        <!-- COVER PICTURE -->
        <img id="cover" src="images/internship.jpg"/>
        <br />
        <br />

        <!-- MAIN CONTENT -->
        <table style="width:100%;">
            <tr>
                <!-- 1ST COLUMN -->
                <td style="width:75%; vertical-align:0px; padding-left:2%; padding-right:2%">
                    <table style="width:100%;">
                        <?php
                        // Define the query:
                        $query = 'SELECT * FROM interns ORDER BY date_updated DESC';
                        
                        if($r = mysql_query($query)) {
                            // run the query
                            while($row = mysql_fetch_array($r)) {
                                if(!empty($row['reserve_user'])) continue;
                                else {
                                print '<tr class="one">
                                    <td class="padding" style="padding-right:20px; width:100%;">
                                        <a class="title_intern" href="show_intern.php?id='.$row['id'].'">'.$row['title'].'</a>
                                    </td>
                                    <td class="padding"><span class="company_intern">'.$row['company'].'</span></td>
                                </tr>';
                                }
                                                             
                            }   
                        }
                        
                        else
                        {
                            // Query didnt run.
                            print '<p style="color: red;">Could not retreive the data because:<br />' . mysql_error() .'.</p>
                            <p>The query being run was: ' .$query. '</p>';
                        } // End of query IF.
                        
                        mysql_close(); // Close the database connection.
                        ?>
                    </table></td>
                <!-- 2RD COLUMN -->
                <td width="28%" style="padding-left:10px; vertical-align:top;">
                    <a href="http://www.jobsforeveryone.in/top-job-sites-in-finland/" target="_blank"><img src="images/ads/we-love-interns.png" style="width:100%" /></a>
                    <p>Internwise is a leading platform connecting employers with talented students and graduates in the UK.</p>
                    
                </td>
            </tr>
        </table>
        <br /><br />

 <?php 
  require 'footer.php';
 ?>
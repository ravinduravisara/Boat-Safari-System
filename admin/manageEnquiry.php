<?php
    include_once("config.php");
    include_once("sessionAdmin.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/manageEnquiry.css">
     <!-- This are icon for dash board -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- This are icon for dash board -->
    
    <!-- scroll reveal effect -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- scroll reveal effect -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Inquiry Management</title>
</head>
<body>
    <div class="container">

        <?php include_once("leftPanel.php"); ?>

        <div class="right_panel">

            <div class="upper_panel">
                <div class="upper_panel_left">
                    <h6>Manage Inquiry</h6>
                </div>

                <?php include_once("upperPanelRight.php"); ?>

            </div>

            <div class="middle_panel">
                <div class="left_box">
                        <h4>Manage Inquries</h4>
                                    
                        <div class="grid">
                            <table>
                                <tr>
                                    <th>InquiryID</th>
                                    <th>Name</th>
                                    <th>Email </th>
                                    <th>Message</th>
                                    
                                </tr>
                                <?php
                        
                                    $sql = "SELECT * FROM inquiry_tb";
                            
                                    $result = $conn->query($sql);
                        
                        
                                    if($result->num_rows>0){
                                        while($row = $result->fetch_assoc()){
                                            $inquiryId = $row["inquiryId"];
                                            $Name = $row["Name"];
                                            $Email = $row["Email"];
                                            $Msg = $row["Message"];
                                            
                                            
                                    
                                            echo '
                                            
                                                    <tr>
                                                        <td>' . $inquiryId. '</td>
                                                        <td>' . $Name. '</td>
                                                        <td>' . $Email. '</td>
                                                        <td>' . $Msg. '</td>                                    
                                                        
                                                    </tr>';
                                                
                                        }
                                    }else{
                                        echo "<td>Empty rows!!</td>";
                                    }


                                ?>

                            </table>

                        </div>
                        
                       
                        
                                                    
                    </div>


   
</body>
</html>
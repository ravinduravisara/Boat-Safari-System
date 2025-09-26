<?php
    include_once("config.php");
    // //create data base if not exists
    // $createDB = "CREATE DATABASE IF NOT EXISTS bstms";
    // // //run the query to create database if database does not exists
    // $conn->query($createDB);//database creation

    //query for table creation if not exists
    // $dropconstraint = "ALTER TABLE feedback DROP FOREIGN KEY user_fk";
    // $conn->query($dropconstraint);
    
    // $dropconstraint = "ALTER TABLE booking DROP FOREIGN KEY user_id_fk";
    // $conn->query($dropconstraint);
   
    // $dropconstraint = "ALTER TABLE booking DROP FOREIGN KEY safari_id_fk";
    // $conn->query($dropconstraint);
   

    // $deletetable = "DROP TABLE IF EXISTS admin";
    // $conn->query($deletetable);
    
    // $deletetable = "DROP TABLE IF EXISTS user";
    // $conn->query($deletetable);
   
    // $deletetable = "DROP TABLE IF EXISTS boat";
    // $conn->query($deletetable);
   
    // $deletetable = "DROP TABLE IF EXISTS msafari";
    // $conn->query($deletetable);
   
    // $deletetable = "DROP TABLE IF EXISTS booking";
    // $conn->query($deletetable);
   
    // $deletetable = "DROP TABLE IF EXISTS inquiry_tb";
    // $conn->query($deletetable);
    
    // $deletetable = "DROP TABLE IF EXISTS feedback";
    // $conn->query($deletetable);
   

    
    $createTableAdmin = "CREATE TABLE IF NOT EXISTS admin(
        adminID VARCHAR(10) PRIMARY KEY,
        fname VARCHAR(50) NOT NULL,
        lname VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        pwd VARCHAR(50) NOT NULL,
        cnumber INT(10) NOT NULL,
        img VARCHAR(100) NOT NULL,
        status VARCHAR(11) NOT NULL
    )";
    //run the query to create tbale if table does not exists
    $conn->query($createTableAdmin);//table creation

    //query for insert data if table is empty
    $insertDataAdmin = "
    INSERT INTO admin 
    VALUES
    ('A001', 'Dinuvi', 'Asithma', 'dinuviasithma@gmail.com', 'Admin@123', 0771234569, 'img1.jpg', 'Activated'),
    ('A002', 'Gayashaan', 'Krishnamoorthy', 'gayashaan49@gmail.com', 'Admin@123', 0771234569, 'img2.jpg', 'Activated'),
    ('A003', 'Shenal', 'Somaweera', 'shenalsomaweera@gmail.com', 'Admin@123', 0774587963, 'img3.jpg', 'Activated'),
    ('A004', 'Sasiru', 'Gunathilaka', 'gunathilakasasiya@gmail.com', 'Admin@123', 0771458963, 'img4.jpg', 'Activated'),
    ('A005', 'Oshada', 'Dhahanayaka', 'oshadha.dahanayaka2002@gmail.com', 'Admin@123', 0774589632, 'img5.jpg', 'Activated')";

    

    
    // check the records in the table
    $readTableAdmin = "SELECT * FROM admin";
    $resultAdmin = $conn->query($readTableAdmin);

    //if table is empty insert data to the table
    if($resultAdmin->num_rows == 0){
        $conn->query($insertDataAdmin);
    }




    $createTableUser = "CREATE TABLE IF NOT EXISTS user(
        userID VARCHAR(10) PRIMARY KEY,
        fname VARCHAR(50) NOT NULL,
        lname VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        pwd VARCHAR(50) NOT NULL,
        cnumber INT(10) NOT NULL,
        Address VARCHAR(200) NOT NULL,
        gender VARCHAR(50) NOT NULL
    )";

    $conn->query($createTableUser);

    $insertDataUser = "
    INSERT INTO user(userID, fname, lname, email, pwd, cnumber,Address,gender) VALUES
    ('U001', 'Dinuvi', 'Asithma', 'dinuviasithma@gmail.com', 'user', 0771234569,'123 moratuwa road panadura','female'),
    ('U002', 'Gayashaan', 'Krishnamoorthy', 'gayashaan49@gmail.com', 'user', 0771234569,'5/89 ja ela road wattala','male'),
    ('U003', 'Shenal', 'Somaweera', 'shenalsomaweera@gmail.com', 'user', 0774587963,'4/35 kaduwela road gampaha','male'),
    ('U004', 'Sasiru', 'Gunathilaka', 'gunathilakasasiya@gmail.com', 'user', 0771458963,'7/90 station road avissawella','male'),
    ('U005', 'Oshada', 'Dhahanayaka', 'oshadha.dahanayaka2002@gmail.com', 'user', 0774589632,'12 galle road alpitiya','male')";


    // check the records in the table
    $readTableUser = "SELECT * FROM user";
    $resultUser = $conn->query($readTableUser);

    //if table is empty insert data to the table
    if($resultUser->num_rows == 0){
        $conn->query($insertDataUser);
    }





    $createTableBoat = "CREATE TABLE IF NOT EXISTS boat(
        b_id VARCHAR(20) PRIMARY KEY,
        b_license_no VARCHAR(20) NOT NULL,
        b_name VARCHAR(20) NOT NULL,
        b_model VARCHAR(20) NOT NULL,
        b_capacity VARCHAR(20) NOT NULL,
        b_length VARCHAR(20) NOT NULL,
        b_weight VARCHAR(20) NOT NULL,
        b_image VARCHAR(20) NOT NULL
    )";
    //run the query to create tbale if table does not exists
    $conn->query($createTableBoat);//table creation

    //query for insert data if table is empty
    $insertDateBoat = "
    INSERT INTO boat 
    VALUES
    ('B001', '1254587', 'Blackperl', 'MB0012', '15', '80m','100Kg', 'img1.jpg'),
    ('B002', '1254565', 'Kraken', 'MB0054', '20', '50m', '120Kg', 'img2.jpeg'),
    ('B003', '1254598', 'Dqeen', 'MB0087', '25', '65m', '130Kg', 'img3.jpeg'),
    ('B004', '1254502', 'Vqeen', 'MB0045', '50', '90m', '125Kg', 'img4.jpg'),
    ('B005', '1254554', 'Gking', 'MB0069', '25', '89m', '135Kg', 'img5.jpeg')";

    

    
    // check the records in the table
    $readTableBoat = "SELECT * FROM boat";
    $resultBoat = $conn->query($readTableBoat);

    //if table is empty insert data to the table
    if($resultBoat->num_rows == 0){
        $conn->query($insertDateBoat);
    }





    $createTableSafari = "CREATE TABLE IF NOT EXISTS msafari(
        Sid VARCHAR(20) PRIMARY KEY,
        Sname VARCHAR(50) NOT NULL,
        Slocation VARCHAR(50) NOT NULL,
        Sprice VARCHAR(50) NOT NULL,
        Sdate DATE NOT NULL,
        Sdescription VARCHAR(1000) NOT NULL
    )";
    //run the query to create tbale if table does not exists
    $conn->query($createTableSafari);//table creation

    //query for insert data if table is empty
    $insertDateSafari = "
    INSERT INTO msafari 
    VALUES

    ('S001', 'Beauty Of Bentota River', 'Bentota', 'LKR15000', '2023-06-05', 'Experiance a magical boat ride in the picturesqure water of place'),
    ('S002', 'Famous Trincomalee Boat ride', 'Trincomalee', 'LKR18000', '2023-07-05', 'Experiance a magical boat ride in the picturesqure water of place'),
    ('S003', 'River Of Mirissa', 'Mirissa', 'LKR19000', '2023-08-05', 'Experiance a magical boat ride in the picturesqure water of place'),
    ('S004', 'Koggala Calm lake', 'Koggala', 'LKR20000', '2023-06-15', 'Experiance a magical boat ride in the picturesqure water of place'),
    ('S005', 'Lake of Galle', 'Galle', 'LKR15000', '2023-09-10', 'Experiance a magical boat ride in the picturesqure water of place')";


    
    // check the records in the table
    $readTableSafari = "SELECT * FROM msafari";
    $resultSafari = $conn->query($readTableSafari);

    //if table is empty insert data to the table
    if($resultSafari->num_rows == 0){
        $conn->query($insertDateSafari);
    }



    $createTableBooking = "CREATE TABLE IF NOT EXISTS booking(
        bookingID VARCHAR(10) PRIMARY KEY,
        userID VARCHAR(10) NOT NULL,
        noOfAdults INT(11) NOT NULL,
        noOfChild INT(11) NOT NULL,
        date date NOT NULL,
        breakfast INT(11) NOT NULL,
        lunch INT(100) NOT NULL,
        cnumber INT(11) NOT NULL,
        Email VARCHAR(50) NOT NULL,
        Sid VARCHAR(20) NOT NULL,
        
        CONSTRAINT safari_id_fk FOREIGN KEY (Sid) REFERENCES msafari (Sid) ON DELETE CASCADE,
        CONSTRAINT user_id_fk FOREIGN KEY (userID) REFERENCES user (userID) ON DELETE CASCADE
        
    )";
    //run the query to create tbale if table does not exists
    $conn->query($createTableBooking);//table creation

    //query for insert data if table is empty
    $insertDataBooking = "
    INSERT INTO booking 
    VALUES
    ('BK001', 'U002', 5, 5, '2023-06-01', 10, 10, 771234569, 'gayashaan49@gmail.com', 'S003'),
    ('BK002', 'U002', 2, 2, '2023-06-16', 4, 4, 771234569, 'gayashaan49@gmail.com', 'S003'),
    ('BK003', 'U002', 5, 2, '2023-06-09', 7, 7, 771234569, 'gayashaan49@gmail.com', 'S003'),
    ('BK004', 'U002', 2, 2, '2023-06-16', 4, 4, 771234569, 'gayashaan49@gmail.com', 'S004'),
    ('BK005', 'U002', 2, 2, '2023-06-16', 4, 4, 771234569, 'gayashaan49@gmail.com', 'S004'),
    ('BK006', 'U001', 1, 1, '2023-06-17', 2, 2, 771234569, 'dinuviasithma@gmail.com', 'S001'),
    ('BK007', 'U001', 4, 4, '2023-06-14', 8, 8, 771234569, 'dinuviasithma@gmail.com', 'S003')";

    

    
    // check the records in the table
    $readTableBooking = "SELECT * FROM booking";
    $resultBooking = $conn->query($readTableBooking);

    //if table is empty insert data to the table
    if($resultBooking->num_rows == 0){
        $conn->query($insertDataBooking);
    }

    $createTableInquiry = "CREATE TABLE IF NOT EXISTS inquiry_tb(
        inquiryId VARCHAR(10) PRIMARY KEY,
        Name VARCHAR(50) NOT NULL,
        Email VARCHAR(50) NOT NULL,
        Message VARCHAR(1000) NOT NULL
        
    )";
    //run the query to create tbale if table does not exists
    $conn->query($createTableInquiry);//table creation

    //query for insert data if table is empty
    $insertDataInquiry = "
    INSERT INTO inquiry_tb 
    VALUES
    ('IN001', 'Gayashaan Krishnamoorthy', 'gayashaan49@gmail.com', 'My account has be deactivated'),
    ('IN002', 'Gayashaan Krishnamoorthy', 'gayashaan49@gmail.com', 'I want to cancel my booking'),
    ('IN003', 'Gayashaan Krishnamoorthy', 'gayashaan49@gmail.com', 'Site is not working properly'),
    ('IN004', 'Oshada Dhahanayaka', 'oshadha.dahanayaka2002@gmail.com', 'I want to cancel my booking'),
    ('IN005', 'Oshada Dhahanayaka', 'dinuviasithma@gmail.com', 'Site is not working properly')";

    

    
    // check the records in the table
    $readTableInquiry = "SELECT * FROM inquiry_tb";
    $resultInquiry = $conn->query($readTableInquiry);

    //if table is empty insert data to the table
    if($resultInquiry->num_rows == 0){
        $conn->query($insertDataInquiry);
    }

    //Feedback
    $createTableFeedback = "CREATE TABLE IF NOT EXISTS feedback(
        feedbackId VARCHAR(10) PRIMARY KEY,
        userID VARCHAR(10) NOT NULL,
        rate INT(5) NOT NULL,
        description VARCHAR(1000) NOT NULL,
        CONSTRAINT user_fk FOREIGN KEY (userID) REFERENCES user (userID) ON DELETE CASCADE
        
    )";
    //run the query to create tbale if table does not exists
    $conn->query($createTableFeedback);//table creation

    //query for insert data if table is empty
    $insertDataFeedback = "
    INSERT INTO feedback 
    VALUES
    ('F001', 'U001', '5', 'Highly recommended'),
    ('F002', 'U002', '4', 'Superb service'),
    ('F003', 'U002', '3', 'Good service'),
    ('F004', 'U005', '5', 'Unforgettable experiance'),
    ('F005', 'U004', '4', 'Need some improvemnets but overall good'),
    ('F006', 'U003', '4', 'Need some improvemnets. pages are not responsive. soo bad. Who are the developers?')";

    

    
    // check the records in the table
    $readTableFeedback = "SELECT * FROM feedback";
    $resultFeedback = $conn->query($readTableFeedback);

    //if table is empty insert data to the table
    if($resultFeedback->num_rows == 0){
        $conn->query($insertDataFeedback);
    }


?>
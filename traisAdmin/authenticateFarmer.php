<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {    
    header('location:index.php');
} else {
    if(isset($_POST['search'])) {
        $agroDealerID = $_POST['searchID'];
        
        // Fetch agro-dealer details from the database
        $sql = "SELECT * FROM agro_dealers WHERE agro_dealer_id = :agroDealerID";
        $query = $dbh->prepare($sql);
        $query->bindParam(':agroDealerID', $agroDealerID, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
    }

    if(isset($_POST['update'])) {
        $agroDealerID = $_POST['agroDealerID'];
        $fullName = $_POST['fullName'];
        $businessName = $_POST['businessName'];
        // Update other fields similarly

        // Update agro-dealer details in the database
        $sql = "UPDATE agro_dealers SET 
                    full_name = :fullName, 
                    business_name = :businessName,
                    -- Add other fields here
                WHERE agro_dealer_id = :agroDealerID";
        
        $query = $dbh->prepare($sql);
        $query->bindParam(':agroDealerID', $agroDealerID, PDO::PARAM_STR);
        $query->bindParam(':fullName', $fullName, PDO::PARAM_STR);
        $query->bindParam(':businessName', $businessName, PDO::PARAM_STR);
        // Bind other fields similarly

        $query->execute();
        
        if($query) {
            $msg = "Agro-Dealer updated successfully!";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<title>AgriEmpower | Manage Agro-Dealer</title>
<meta charset="UTF-8">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-2.1.4.min.js"></script>
</head>







<body>
<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <?php include('includes/header.php'); ?>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Manage Agro-Dealer</li>
            </ol>
            
            <div class="agile-grids">    
                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>Manage Agro-Dealer</h2>
                        
                        <?php if($msg){?><div class="alert alert-success" role="alert"><?php echo htmlentities($msg); ?></div><?php } 
                        else if($error){?><div class="alert alert-danger" role="alert"><?php echo htmlentities($error); ?></div><?php }?>

                        <!-- Search Form -->
                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td><label for="searchID">Search Agro-Dealer by ID</label><input type="text" name="searchID" class="form-control" required></td>
                                    <td><button type="submit" name="search" class="btn btn-primary">Search</button></td>
                                </tr>
                            </table>
                        </form>
                        
                        <?php if(isset($result)) { ?>
                        <!-- Update Form -->
                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td><label for="agroDealerID">Agro-Dealer ID</label><input type="text" name="agroDealerID" value="<?php echo htmlentities($result['agro_dealer_id']); ?>" class="form-control" readonly></td>
                                    <td><label for="fullName">Full Name</label><input type="text" name="fullName" value="<?php echo htmlentities($result['full_name']); ?>" class="form-control" required></td>
                                    <td><label for="businessName">Business Name</label><input type="text" name="businessName" value="<?php echo htmlentities($result['business_name']); ?>" class="form-control" required></td>
                                </tr>
                                <!-- Add other fields here similarly -->
                                <tr>
                                    <td colspan="3"><button type="submit" name="update" class="btn btn-primary">Update Agro-Dealer</button></td>
                                </tr>
                            </table>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('includes/sidebarmenu.php'); ?>
</div>
</body>
</html>
<?php } ?>
<? include('');
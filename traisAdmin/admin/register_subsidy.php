<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {    
    header('location:index.php');
} else {
    if(isset($_POST['submit'])) {
        $subsidyID = $_POST['subsidyID'];
        $subsidyType = $_POST['subsidyType'];
        $subsidyValue = $_POST['subsidyValue'];
        $dateGiven = $_POST['dateGiven'];
        $dateTaken = $_POST['dateTaken'];
        $subsidyBeneficiary = $_POST['subsidyBeneficiary'];
        $beneficiaryIdentity = $_POST['beneficiaryIdentity'];
        $lastBenefits = $_POST['lastBenefits'];

        // Insert subsidy details into the database
        $sql = "INSERT INTO subsidies (subsidy_id, subsidy_type, subsidy_value, date_given, date_taken, subsidy_beneficiary, beneficiary_identity, last_benefits) 
                VALUES (:subsidyID, :subsidyType, :subsidyValue, :dateGiven, :dateTaken, :subsidyBeneficiary, :beneficiaryIdentity, :lastBenefits)";
        
        $query = $dbh->prepare($sql);
        $query->bindParam(':subsidyID', $subsidyID, PDO::PARAM_STR);
        $query->bindParam(':subsidyType', $subsidyType, PDO::PARAM_STR);
        $query->bindParam(':subsidyValue', $subsidyValue, PDO::PARAM_STR);
        $query->bindParam(':dateGiven', $dateGiven, PDO::PARAM_STR);
        $query->bindParam(':dateTaken', $dateTaken, PDO::PARAM_STR);
        $query->bindParam(':subsidyBeneficiary', $subsidyBeneficiary, PDO::PARAM_STR);
        $query->bindParam(':beneficiaryIdentity', $beneficiaryIdentity, PDO::PARAM_STR);
        $query->bindParam(':lastBenefits', $lastBenefits, PDO::PARAM_STR);
        
        $query->execute();
        
        if($query) {
            $msg = "Subsidy registered successfully!";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<title>AgriEmpower | Register Subsidy</title>
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
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Register Subsidy</li>
            </ol>
            
            <div class="agile-grids">    
                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>Register Subsidy</h2>
                        
                        <?php if($msg){?><div class="alert alert-success" role="alert"><?php echo htmlentities($msg); ?></div><?php } 
                        else if($error){?><div class="alert alert-danger" role="alert"><?php echo htmlentities($error); ?></div><?php }?>

                        <!-- Subsidy Registration Form -->
                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td><label for="subsidyID">Subsidy ID</label><input type="text" name="subsidyID" class="form-control" required></td>
                                    <td><label for="subsidyType">Subsidy Type</label>
                                        <select name="subsidyType" class="form-control" required>
                                            <option value="Fertilizer">Fertilizer</option>
                                            <option value="Seeds">Seeds</option>
                                            <option value="Insecticide">Insecticide</option>
                                            <option value="Herbicide">Herbicide</option>
                                            <option value="Farm Implements">Farm Implements</option>
                                            <option value="Machinery">Machinery</option>
                                        </select>
                                    </td>
                                    <td><label for="subsidyValue">Subsidy Value (%)</label><input type="number" step="0.01" name="subsidyValue" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="dateGiven">Date Given</label><input type="date" name="dateGiven" class="form-control" required></td>
                                    <td><label for="dateTaken">Date Taken</label><input type="date" name="dateTaken" class="form-control"></td>
                                    <td><label for="subsidyBeneficiary">Subsidy Beneficiary</label><input type="text" name="subsidyBeneficiary" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="beneficiaryIdentity">Beneficiary Identity</label><input type="text" name="beneficiaryIdentity" class="form-control" required></td>
                                    <td><label for="lastBenefits">Last Benefits</label><textarea name="lastBenefits" class="form-control"></textarea></td>
                                    <td><button type="submit" name="submit" class="btn btn-primary">Register Subsidy</button></td>
                                </tr>
                            </table>
                        </form>
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

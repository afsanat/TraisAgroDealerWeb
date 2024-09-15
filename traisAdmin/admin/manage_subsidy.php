<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {    
    header('location:index.php');
} else {
    if(isset($_POST['search'])) {
        $beneficiaryIdentity = $_POST['searchID'];
        
        // Fetch subsidy details from the database
        $sql = "SELECT * FROM subsidies WHERE beneficiary_identity = :beneficiaryIdentity";
        $query = $dbh->prepare($sql);
        $query->bindParam(':beneficiaryIdentity', $beneficiaryIdentity, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
    }

    if(isset($_POST['update'])) {
        $subsidyID = $_POST['subsidyID'];
        $subsidyType = $_POST['subsidyType'];
        $subsidyValue = $_POST['subsidyValue'];
        $dateGiven = $_POST['dateGiven'];
        $dateTaken = $_POST['dateTaken'];
        $subsidyBeneficiary = $_POST['subsidyBeneficiary'];
        $beneficiaryIdentity = $_POST['beneficiaryIdentity'];
        $lastBenefits = $_POST['lastBenefits'];

        // Update subsidy details in the database
        $sql = "UPDATE subsidies SET 
                    subsidy_type = :subsidyType, 
                    subsidy_value = :subsidyValue,
                    date_given = :dateGiven,
                    date_taken = :dateTaken,
                    subsidy_beneficiary = :subsidyBeneficiary,
                    last_benefits = :lastBenefits
                WHERE subsidy_id = :subsidyID AND beneficiary_identity = :beneficiaryIdentity";
        
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
            $msg = "Subsidy details updated successfully!";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<title>AgriEmpower | Manage Subsidy</title>
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
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Manage Subsidy</li>
            </ol>
            
            <div class="agile-grids">    
                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>Manage Subsidy</h2>
                        
                        <?php if($msg){?><div class="alert alert-success" role="alert"><?php echo htmlentities($msg); ?></div><?php } 
                        else if($error){?><div class="alert alert-danger" role="alert"><?php echo htmlentities($error); ?></div><?php }?>

                        <!-- Subsidy Search Form -->
                        <form method="post">
                            <div class="form-group">
                                <label for="searchID">Beneficiary Identity</label>
                                <input type="text" name="searchID" class="form-control" required>
                            </div>
                            <button type="submit" name="search" class="btn btn-primary">Search</button>
                        </form>

                        <!-- Subsidy Update Form -->
                        <?php if(isset($result)) { ?>
                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td><label for="subsidyID">Subsidy ID</label><input type="text" name="subsidyID" class="form-control" value="<?php echo $result['subsidy_id']; ?>" readonly></td>
                                    <td><label for="subsidyType">Subsidy Type</label>
                                        <select name="subsidyType" class="form-control" required>
                                            <option value="Fertilizer" <?php echo $result['subsidy_type'] == 'Fertilizer' ? 'selected' : ''; ?>>Fertilizer</option>
                                            <option value="Seeds" <?php echo $result['subsidy_type'] == 'Seeds' ? 'selected' : ''; ?>>Seeds</option>
                                            <option value="Insecticide" <?php echo $result['subsidy_type'] == 'Insecticide' ? 'selected' : ''; ?>>Insecticide</option>
                                            <option value="Herbicide" <?php echo $result['subsidy_type'] == 'Herbicide' ? 'selected' : ''; ?>>Herbicide</option>
                                            <option value="Farm Implements" <?php echo $result['subsidy_type'] == 'Farm Implements' ? 'selected' : ''; ?>>Farm Implements</option>
                                            <option value="Machinery" <?php echo $result['subsidy_type'] == 'Machinery' ? 'selected' : ''; ?>>Machinery</option>
                                        </select>
                                    </td>
                                    <td><label for="subsidyValue">Subsidy Value (%)</label><input type="number" step="0.01" name="subsidyValue" class="form-control" value="<?php echo $result['subsidy_value']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td><label for="dateGiven">Date Given</label><input type="date" name="dateGiven" class="form-control" value="<?php echo $result['date_given']; ?>" required></td>
                                    <td><label for="dateTaken">Date Taken</label><input type="date" name="dateTaken" class="form-control" value="<?php echo $result['date_taken']; ?>"></td>
                                    <td><label for="subsidyBeneficiary">Subsidy Beneficiary</label><input type="text" name="subsidyBeneficiary" class="form-control" value="<?php echo $result['subsidy_beneficiary']; ?>" required></td>
                                </tr>
                                <tr>
                                    <td><label for="beneficiaryIdentity">Beneficiary Identity</label><input type="text" name="beneficiaryIdentity" class="form-control" value="<?php echo $result['beneficiary_identity']; ?>" readonly></td>
                                    <td><label for="lastBenefits">Last Benefits</label><textarea name="lastBenefits" class="form-control"><?php echo $result['last_benefits']; ?></textarea></td>
                                    <td><button type="submit" name="update" class="btn btn-primary">Update Subsidy</button></td>
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

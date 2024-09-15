<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {	
    header('location:index.php');
} else {
    if(isset($_POST['search'])) {
        $farmerID = $_POST['farmerID'];
        // Fetch farmer details based on ID
        $sql = "SELECT * FROM tblfarmers WHERE ID = :farmerID";
        $query = $dbh->prepare($sql);
        $query->bindParam(':farmerID', $farmerID, PDO::PARAM_INT);
        $query->execute();
        $farmer = $query->fetch(PDO::FETCH_ASSOC);
    }

    if(isset($_POST['update'])) {
        // Gather updated form data
        $ID = $_POST['ID'];
        $FullName = $_POST['FullName'];
        $Gender = $_POST['Gender'];
        $DateOfBirth = $_POST['DateOfBirth'];
        $DisabilityStatus = $_POST['DisabilityStatus'];
        $NationalIDNumber = $_POST['NationalIDNumber'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $FarmAddress = $_POST['FarmAddress'];
        $Village = $_POST['Village'];
        $County = $_POST['County'];
        $LandSize = $_POST['LandSize'];
        $CropType = $_POST['CropType'];
        $CooperativeMembership = $_POST['CooperativeMembership'];
        $InputUsage = $_POST['InputUsage'];
        $YieldInfo = $_POST['YieldInfo'];
        $HouseholdSize = $_POST['HouseholdSize'];
        $IncomeLevel = $_POST['IncomeLevel'];
        $IrrigationAccess = $_POST['IrrigationAccess'];
        $MarketAccess = $_POST['MarketAccess'];
        $VulnerabilityStatus = $_POST['VulnerabilityStatus'];
        $DisasterProneArea = $_POST['DisasterProneArea'];
        $ResourcesAccess = $_POST['ResourcesAccess'];

        // Update farmer details in the database
        $sql = "UPDATE tblfarmers SET 
                    FullName = :FullName,
                    Gender = :Gender,
                    DateOfBirth = :DateOfBirth,
                    DisabilityStatus = :DisabilityStatus,
                    NationalIDNumber = :NationalIDNumber,
                    PhoneNumber = :PhoneNumber,
                    FarmAddress = :FarmAddress,
                    Village = :Village,
                    County = :County,
                    LandSize = :LandSize,
                    CropType = :CropType,
                    CooperativeMembership = :CooperativeMembership,
                    InputUsage = :InputUsage,
                    YieldInfo = :YieldInfo,
                    HouseholdSize = :HouseholdSize,
                    IncomeLevel = :IncomeLevel,
                    IrrigationAccess = :IrrigationAccess,
                    MarketAccess = :MarketAccess,
                    VulnerabilityStatus = :VulnerabilityStatus,
                    DisasterProneArea = :DisasterProneArea,
                    ResourcesAccess = :ResourcesAccess
                WHERE ID = :ID";
        
        $query = $dbh->prepare($sql);
        $query->bindParam(':ID', $ID, PDO::PARAM_INT);
        $query->bindParam(':FullName', $FullName, PDO::PARAM_STR);
        $query->bindParam(':Gender', $Gender, PDO::PARAM_STR);
        $query->bindParam(':DateOfBirth', $DateOfBirth, PDO::PARAM_STR);
        $query->bindParam(':DisabilityStatus', $DisabilityStatus, PDO::PARAM_STR);
        $query->bindParam(':NationalIDNumber', $NationalIDNumber, PDO::PARAM_STR);
        $query->bindParam(':PhoneNumber', $PhoneNumber, PDO::PARAM_STR);
        $query->bindParam(':FarmAddress', $FarmAddress, PDO::PARAM_STR);
        $query->bindParam(':Village', $Village, PDO::PARAM_STR);
        $query->bindParam(':County', $County, PDO::PARAM_STR);
        $query->bindParam(':LandSize', $LandSize, PDO::PARAM_STR);
        $query->bindParam(':CropType', $CropType, PDO::PARAM_STR);
        $query->bindParam(':CooperativeMembership', $CooperativeMembership, PDO::PARAM_STR);
        $query->bindParam(':InputUsage', $InputUsage, PDO::PARAM_STR);
        $query->bindParam(':YieldInfo', $YieldInfo, PDO::PARAM_STR);
        $query->bindParam(':HouseholdSize', $HouseholdSize, PDO::PARAM_INT);
        $query->bindParam(':IncomeLevel', $IncomeLevel, PDO::PARAM_STR);
        $query->bindParam(':IrrigationAccess', $IrrigationAccess, PDO::PARAM_STR);
        $query->bindParam(':MarketAccess', $MarketAccess, PDO::PARAM_STR);
        $query->bindParam(':VulnerabilityStatus', $VulnerabilityStatus, PDO::PARAM_STR);
        $query->bindParam(':DisasterProneArea', $DisasterProneArea, PDO::PARAM_STR);
        $query->bindParam(':ResourcesAccess', $ResourcesAccess, PDO::PARAM_STR);
        
        $query->execute();
        
        if($query) {
            $msg = "Farmer details updated successfully!";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<title>AgriEmpower | Search and Update Farmer</title>
<meta charset="UTF-8">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-2.1.4.min.js"></script>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td {
        padding: 8px;
        vertical-align: top;
    }
    .form-control {
        width: 100%;
    }
</style>
</head> 
<body>
<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <?php include('includes/header.php'); ?>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Search and Update Farmer</li>
            </ol>
            
            <div class="agile-grids">    
                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>Search and Update Farmer</h2>
                        
                        <?php if($msg){?><div class="alert alert-success" role="alert"><?php echo htmlentities($msg); ?></div><?php } 
                        else if($error){?><div class="alert alert-danger" role="alert"><?php echo htmlentities($error); ?></div><?php }?>

                        <!-- Search Form -->
                        <form method="post">
                            <h3>Search Farmer by ID</h3>
                            <div class="form-group">
                                <label for="farmerID">Farmer ID</label>
                                <input type="number" name="farmerID" class="form-control" required>
                                <button type="submit" name="search" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                        
                        <?php if(isset($farmer) && $farmer): ?>
                        <!-- Update Form -->
                        <form method="post">
                            <input type="hidden" name="ID" value="<?php echo $farmer['ID']; ?>">
                            <h3>Update Farmer Details</h3>
                            <table>
                                <tr>
                                    <td><label for="FullName">Full Name</label><input type="text" name="FullName" class="form-control" value="<?php echo htmlentities($farmer['FullName']); ?>" required></td>
                                    <td><label for="Gender">Gender</label>
                                        <select name="Gender" class="form-control" required>
                                            <option value="Male" <?php echo $farmer['Gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                                            <option value="Female" <?php echo $farmer['Gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                                        </select>
                                    </td>
                                    <td><label for="DateOfBirth">Date of Birth</label><input type="date" name="DateOfBirth" class="form-control" value="<?php echo htmlentities($farmer['DateOfBirth']); ?>" required></td>
                                    <td><label for="DisabilityStatus">Disability Status</label>
                                        <select name="DisabilityStatus" class="form-control" required>
                                            <option value="No" <?php echo $farmer['DisabilityStatus'] == 'No' ? 'selected' : ''; ?>>No</option>
                                            <option value="Yes" <?php echo $farmer['DisabilityStatus'] == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="NationalIDNumber">National ID Number</label><input type="text" name="NationalIDNumber" class="form-control" value="<?php echo htmlentities($farmer['NationalIDNumber']); ?>" required></td>
                                    <td><label for="PhoneNumber">Phone Number</label><input type="text" name="PhoneNumber" class="form-control" value="<?php echo htmlentities($farmer['PhoneNumber']); ?>" required></td>
                                    <td><label for="FarmAddress">Farm Address</label><input type="text" name="FarmAddress" class="form-control" value="<?php echo htmlentities($farmer['FarmAddress']); ?>" required></td>
                                    <td><label for="Village">Village</label><input type="text" name="Village" class="form-control" value="<?php echo htmlentities($farmer['Village']); ?>" required></td>
                                </tr>
                                <tr>
                                    <td><label for="County">County</label><input type="text" name="County" class="form-control" value="<?php echo htmlentities($farmer['County']); ?>" required></td>
                                    <td><label for="LandSize">Land Size (hectares)</label><input type="number" step="0.01" name="LandSize" class="form-control" value="<?php echo htmlentities($farmer['LandSize']); ?>" required></td>
                                    <td><label for="CropType">Crop Type</label><input type="text" name="CropType" class="form-control" value="<?php echo htmlentities($farmer['CropType']); ?>" required></td>
                                    <td><label for="CooperativeMembership">Cooperative Membership</label>
                                        <select name="CooperativeMembership" class="form-control" required>
                                            <option value="Yes" <?php echo $farmer['CooperativeMembership'] == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                                            <option value="No" <?php echo $farmer['CooperativeMembership'] == 'No' ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="InputUsage">Input Usage</label><input type="text" name="InputUsage" class="form-control" value="<?php echo htmlentities($farmer['InputUsage']); ?>" required></td>
                                    <td><label for="YieldInfo">Yield Information</label><input type="text" name="YieldInfo" class="form-control" value="<?php echo htmlentities($farmer['YieldInfo']); ?>" required></td>
                                    <td><label for="HouseholdSize">Household Size</label><input type="number" name="HouseholdSize" class="form-control" value="<?php echo htmlentities($farmer['HouseholdSize']); ?>" required></td>
                                    <td><label for="IncomeLevel">Income Level</label><input type="text" name="IncomeLevel" class="form-control" value="<?php echo htmlentities($farmer['IncomeLevel']); ?>" required></td>
                                </tr>
                                <tr>
                                    <td><label for="IrrigationAccess">Access to Irrigation</label>
                                        <select name="IrrigationAccess" class="form-control" required>
                                            <option value="Yes" <?php echo $farmer['IrrigationAccess'] == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                                            <option value="No" <?php echo $farmer['IrrigationAccess'] == 'No' ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </td>
                                    <td><label for="MarketAccess">Access to Market</label>
                                        <select name="MarketAccess" class="form-control" required>
                                            <option value="Yes" <?php echo $farmer['MarketAccess'] == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                                            <option value="No" <?php echo $farmer['MarketAccess'] == 'No' ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </td>
                                    <td><label for="DisasterProneArea">Disaster-Prone Area</label>
                                        <select name="DisasterProneArea" class="form-control" required>
                                            <option value="Yes" <?php echo $farmer['DisasterProneArea'] == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                                            <option value="No" <?php echo $farmer['DisasterProneArea'] == 'No' ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </td>
                                    <td><label for="ResourcesAccess">Access to Resources</label><input type="text" name="ResourcesAccess" class="form-control" value="<?php echo htmlentities($farmer['ResourcesAccess']); ?>" required></td>
                                </tr>
                            </table>

                            <button type="submit" name="update" class="btn btn-primary">Update Farmer</button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="inner-block"></div>
            <?php include('includes/footer.php'); ?>
        </div>
    </div>
    <?php include('includes/sidebarmenu.php'); ?>
</div>

<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php } ?>
<? include('');
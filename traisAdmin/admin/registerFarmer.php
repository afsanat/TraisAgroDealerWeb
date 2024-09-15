<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {	
    header('location:index.php');
} else {
    if(isset($_POST['submit'])) {
        // Gather all form data
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

        // Insert farmer details into the database
        $sql = "INSERT INTO tblfarmers (FullName, Gender, DateOfBirth, DisabilityStatus, NationalIDNumber, PhoneNumber, FarmAddress, Village, County, LandSize, CropType, CooperativeMembership, InputUsage, YieldInfo, HouseholdSize, IncomeLevel, IrrigationAccess, MarketAccess, VulnerabilityStatus, DisasterProneArea, ResourcesAccess) 
                VALUES (:FullName, :Gender, :DateOfBirth, :DisabilityStatus, :NationalIDNumber, :PhoneNumber, :FarmAddress, :Village, :County, :LandSize, :CropType, :CooperativeMembership, :InputUsage, :YieldInfo, :HouseholdSize, :IncomeLevel, :IrrigationAccess, :MarketAccess, :VulnerabilityStatus, :DisasterProneArea, :ResourcesAccess)";
        
        $query = $dbh->prepare($sql);
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
            $msg = "Farmer registered successfully!";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<title>AgriEmpower | Register Farmer</title>
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
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Register Farmer</li>
            </ol>
            
            <div class="agile-grids">    
                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>Register Farmer</h2>
                        
                        <?php if($msg){?><div class="alert alert-success" role="alert"><?php echo htmlentities($msg); ?></div><?php } 
                        else if($error){?><div class="alert alert-danger" role="alert"><?php echo htmlentities($error); ?></div><?php }?>

                        <form method="post">
                            <!-- Personal Information -->
                            <h3>Personal Information</h3>
                            <table>
                                <tr>
                                    <td><label for="FullName">Full Name</label><input type="text" name="FullName" class="form-control" required></td>
                                    <td><label for="Gender">Gender</label>
                                        <select name="Gender" class="form-control" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </td>
                                    <td><label for="DateOfBirth">Date of Birth</label><input type="date" name="DateOfBirth" class="form-control" required></td>
                                    <td><label for="DisabilityStatus">Disability Status</label>
                                        <select name="DisabilityStatus" class="form-control" required>
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="NationalIDNumber">National ID Number</label><input type="text" name="NationalIDNumber" class="form-control" required></td>
                                    <td><label for="PhoneNumber">Phone Number</label><input type="text" name="PhoneNumber" class="form-control" required></td>
                                    <td colspan="2"><label for="FarmAddress">Farm Address</label><textarea name="FarmAddress" class="form-control" required></textarea></td>
                                </tr>
                            </table>

                            <!-- Location and Farm Details -->
                            <h3>Location and Farm Details</h3>
                            <table>
                                <tr>
                                    <td><label for="Village">Village</label><input type="text" name="Village" class="form-control" required></td>
                                    <td><label for="County">County</label><input type="text" name="County" class="form-control" required></td>
                                    <td><label for="LandSize">Size of Landholding (hectares)</label><input type="number" step="0.01" name="LandSize" class="form-control" required></td>
                                    <td><label for="CropType">Primary Crop Type</label><input type="text" name="CropType" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="InputUsage">Input Usage</label><textarea name="InputUsage" class="form-control" required></textarea></td>
                                    <td><label for="YieldInfo">Yield Information</label><textarea name="YieldInfo" class="form-control" required></textarea></td>
                                    <td><label for="LastFarmProduce">Last Farm Produce</label><input type="text" name="LastFarmProduce" class="form-control" required></td>
                                    <td><label for="PreviousInputUsage">Previous Input Usage</label><input type="text" name="PreviousInputUsage" class="form-control" required></td>
                                </tr>
                            </table>

                            <!-- Socioeconomic and Household Information -->
                            <h3>Socioeconomic and Household Information</h3>
                            <table>
                                <tr>
                                    <td><label for="HouseholdSize">Household Size</label><input type="number" name="HouseholdSize" class="form-control" required></td>
                                    <td><label for="IncomeLevel">Income Level</label><input type="text" name="IncomeLevel" class="form-control" required></td>
                                    <td><label for="VulnerabilityStatus">Vulnerability Status</label><input type="text" name="VulnerabilityStatus" class="form-control" required></td>
                                    <td><label for="CooperativeMembership">Cooperative Membership</label>
                                        <select name="CooperativeMembership" class="form-control" required>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <!-- Farm Operations and Membership -->
                            <h3>Farm Operations and Membership</h3>
                            <table>
                                <tr>
                                    <td><label for="ParticipatedInExtensionServices">Participated in Extension Services?</label>
                                        <select name="ParticipatedInExtensionServices" class="form-control" required>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </td>
                                    <td><label for="ProofOfInputUse">Proof of Input Use</label><input type="text" name="ProofOfInputUse" class="form-control" required></td>
                                </tr>
                            </table>

                            <!-- Resource Access and Vulnerability -->
                            <h3>Resource Access and Vulnerability</h3>
                            <table>
                                <tr>
                                    <td><label for="IrrigationAccess">Access to Irrigation</label>
                                        <select name="IrrigationAccess" class="form-control" required>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </td>
                                    <td><label for="MarketAccess">Access to Market</label>
                                        <select name="MarketAccess" class="form-control" required>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </td>
                                    <td><label for="DisasterProneArea">Disaster-Prone Area</label>
                                        <select name="DisasterProneArea" class="form-control" required>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </td>
                                    <td><label for="ResourcesAccess">Access to Resources</label><input type="text" name="ResourcesAccess" class="form-control" required></td>
                                </tr>
                            </table>

                            <button type="submit" name="submit" class="btn btn-primary">Register Farmer</button>
                        </form>
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
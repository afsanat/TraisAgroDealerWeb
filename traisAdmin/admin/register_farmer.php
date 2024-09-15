<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {    
    header('location:index.php');
} else {
    if(isset($_POST['submit'])) {
        // Capture form data
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

        // Decision Tree Logic
        $subsidyThreashold = 0;
        function classifyFarmer($landSize, $incomeLevel, $householdSize) {
            $landSizeThreshold = 5; // in hectares
            $incomeThreshold = 20000; // income level threshold
            $householdSizeThreshold = 5; // number of household members
            

            if ($landSize <= $landSizeThreshold) {
                return "Smallholder";
            } elseif ($incomeLevel < $incomeThreshold) {
                return "Smallholder";
            } elseif ($householdSize > $householdSizeThreshold) {
                return "Smallholder";
            } else {
                return "Not Smallholder";
            }
        }

        // Apply decision tree classification
        $classification = classifyFarmer($LandSize, $IncomeLevel, $HouseholdSize);

        // Insert farmer details into the database
        $sql = "INSERT INTO tblfarmers (FullName, Gender, DateOfBirth, DisabilityStatus, NationalIDNumber, PhoneNumber, FarmAddress, Village, County, LandSize, CropType, CooperativeMembership, InputUsage, YieldInfo, HouseholdSize, IncomeLevel, IrrigationAccess, MarketAccess, VulnerabilityStatus, DisasterProneArea, ResourcesAccess, Classification) 
                VALUES (:FullName, :Gender, :DateOfBirth, :DisabilityStatus, :NationalIDNumber, :PhoneNumber, :FarmAddress, :Village, :County, :LandSize, :CropType, :CooperativeMembership, :InputUsage, :YieldInfo, :HouseholdSize, :IncomeLevel, :IrrigationAccess, :MarketAccess, :VulnerabilityStatus, :DisasterProneArea, :ResourcesAccess, :Classification)";
        
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
        $query->bindParam(':Classification', $classification, PDO::PARAM_STR);
        
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
                            <!-- Form fields here -->
                            <!-- Use borderless table layout if preferred -->
                            <table class="table table-bordered">
                                <tr>
                                    <td><label for="FullName">Full Name</label></td>
                                    <td><input type="text" name="FullName" class="form-control" required></td>
                                    <td><label for="Gender">Gender</label></td>
                                    <td><select name="Gender" class="form-control" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td><label for="DateOfBirth">Date of Birth</label></td>
                                    <td><input type="date" name="DateOfBirth" class="form-control" required></td>
                                    <td><label for="DisabilityStatus">Disability Status</label></td>
                                    <td><select name="DisabilityStatus" class="form-control" required>
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td><label for="NationalIDNumber">National ID Number</label></td>
                                    <td><input type="text" name="NationalIDNumber" class="form-control" required></td>
                                    <td><label for="PhoneNumber">Phone Number</label></td>
                                    <td><input type="text" name="PhoneNumber" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="FarmAddress">Farm Address</label></td>
                                    <td colspan="3"><textarea name="FarmAddress" class="form-control" required></textarea></td>
                                </tr>
                                <tr>
                                    <td><label for="Village">Village</label></td>
                                    <td><input type="text" name="Village" class="form-control" required></td>
                                    <td><label for="County">County</label></td>
                                    <td><input type="text" name="County" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="LandSize">Land Size (in hectares)</label></td>
                                    <td><input type="number" name="LandSize" class="form-control" step="0.01" required></td>
                                    <td><label for="CropType">Crop Type</label></td>
                                    <td><input type="text" name="CropType" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="CooperativeMembership">Cooperative Membership</label></td>
                                    <td><input type="text" name="CooperativeMembership" class="form-control"></td>
                                    <td><label for="InputUsage">Input Usage</label></td>
                                    <td><input type="text" name="InputUsage" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="YieldInfo">Yield Information</label></td>
                                    <td><input type="text" name="YieldInfo" class="form-control"></td>
                                    <td><label for="HouseholdSize">Household Size</label></td>
                                    <td><input type="number" name="HouseholdSize" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="IncomeLevel">Income Level</label></td>
                                    <td><input type="number" name="IncomeLevel" class="form-control" required></td>
                                    <td><label for="IrrigationAccess">Irrigation Access</label></td>
                                    <td><input type="text" name="IrrigationAccess" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="MarketAccess">Market Access</label></td>
                                    <td><input type="text" name="MarketAccess" class="form-control"></td>
                                    <td><label for="VulnerabilityStatus">Vulnerability Status</label></td>
                                    <td><input type="text" name="VulnerabilityStatus" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="DisasterProneArea">Disaster-Prone Area</label></td>
                                    <td><input type="text" name="DisasterProneArea" class="form-control"></td>
                                    <td><label for="ResourcesAccess">Resources Access</label></td>
                                    <td><input type="text" name="ResourcesAccess" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="text-align: center;">
                                        <button type="submit" name="submit" class="btn btn-primary">Register Farmer</button>
                                    </td>
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
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>
<? include('');
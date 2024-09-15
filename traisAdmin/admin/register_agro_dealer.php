<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == 0) {    
    header('location:index.php');
} else {
    if(isset($_POST['submit'])) {
        $agroDealerID = $_POST['agroDealerID'];
        $fullName = $_POST['fullName'];
        $businessName = $_POST['businessName'];
        $businessType = $_POST['businessType'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $gender = $_POST['gender'];
        $nationalIDNumber = $_POST['nationalIDNumber'];
        $businessRegistrationNumber = $_POST['businessRegistrationNumber'];
        $taxIdentificationNumber = $_POST['taxIdentificationNumber'];
        $phoneNumber = $_POST['phoneNumber'];
        $emailAddress = $_POST['emailAddress'];
        $businessAddress = $_POST['businessAddress'];
        $postalAddress = $_POST['postalAddress'];
        $bankName = $_POST['bankName'];
        $bankAccountNumber = $_POST['bankAccountNumber'];
        $bankBranch = $_POST['bankBranch'];
        $bankAccountType = $_POST['bankAccountType'];
        $accountHolderName = $_POST['accountHolderName'];
        $iban = $_POST['iban'];
        $swiftCode = $_POST['swiftCode'];
        $yearsInOperation = $_POST['yearsInOperation'];
        $typeOfAgroProducts = $_POST['typeOfAgroProducts'];
        $supplierRelationships = $_POST['supplierRelationships'];
        $distributionChannels = $_POST['distributionChannels'];
        $previousSubsidyClaims = $_POST['previousSubsidyClaims'];
        $certificationDetails = $_POST['certificationDetails'];
        $regulatoryCompliance = $_POST['regulatoryCompliance'];
        $auditReports = $_POST['auditReports'];

        // Insert agro-dealer details into the database
        $sql = "INSERT INTO agro_dealers (
                    agro_dealer_id, full_name, business_name, business_type, date_of_birth, gender, 
                    national_id_number, business_registration_number, tax_identification_number, 
                    phone_number, email_address, business_address, postal_address, bank_name, 
                    bank_account_number, bank_branch, bank_account_type, account_holder_name, 
                    iban, swift_code, years_in_operation, type_of_agro_products, 
                    supplier_relationships, distribution_channels, previous_subsidy_claims, 
                    certification_details, regulatory_compliance, audit_reports
                ) VALUES (
                    :agroDealerID, :fullName, :businessName, :businessType, :dateOfBirth, :gender, 
                    :nationalIDNumber, :businessRegistrationNumber, :taxIdentificationNumber, 
                    :phoneNumber, :emailAddress, :businessAddress, :postalAddress, :bankName, 
                    :bankAccountNumber, :bankBranch, :bankAccountType, :accountHolderName, 
                    :iban, :swiftCode, :yearsInOperation, :typeOfAgroProducts, 
                    :supplierRelationships, :distributionChannels, :previousSubsidyClaims, 
                    :certificationDetails, :regulatoryCompliance, :auditReports
                )";

        $query = $dbh->prepare($sql);
        $query->bindParam(':agroDealerID', $agroDealerID, PDO::PARAM_STR);
        $query->bindParam(':fullName', $fullName, PDO::PARAM_STR);
        $query->bindParam(':businessName', $businessName, PDO::PARAM_STR);
        $query->bindParam(':businessType', $businessType, PDO::PARAM_STR);
        $query->bindParam(':dateOfBirth', $dateOfBirth, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':nationalIDNumber', $nationalIDNumber, PDO::PARAM_STR);
        $query->bindParam(':businessRegistrationNumber', $businessRegistrationNumber, PDO::PARAM_STR);
        $query->bindParam(':taxIdentificationNumber', $taxIdentificationNumber, PDO::PARAM_STR);
        $query->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
        $query->bindParam(':emailAddress', $emailAddress, PDO::PARAM_STR);
        $query->bindParam(':businessAddress', $businessAddress, PDO::PARAM_STR);
        $query->bindParam(':postalAddress', $postalAddress, PDO::PARAM_STR);
        $query->bindParam(':bankName', $bankName, PDO::PARAM_STR);
        $query->bindParam(':bankAccountNumber', $bankAccountNumber, PDO::PARAM_STR);
        $query->bindParam(':bankBranch', $bankBranch, PDO::PARAM_STR);
        $query->bindParam(':bankAccountType', $bankAccountType, PDO::PARAM_STR);
        $query->bindParam(':accountHolderName', $accountHolderName, PDO::PARAM_STR);
        $query->bindParam(':iban', $iban, PDO::PARAM_STR);
        $query->bindParam(':swiftCode', $swiftCode, PDO::PARAM_STR);
        $query->bindParam(':yearsInOperation', $yearsInOperation, PDO::PARAM_INT);
        $query->bindParam(':typeOfAgroProducts', $typeOfAgroProducts, PDO::PARAM_STR);
        $query->bindParam(':supplierRelationships', $supplierRelationships, PDO::PARAM_STR);
        $query->bindParam(':distributionChannels', $distributionChannels, PDO::PARAM_STR);
        $query->bindParam(':previousSubsidyClaims', $previousSubsidyClaims, PDO::PARAM_STR);
        $query->bindParam(':certificationDetails', $certificationDetails, PDO::PARAM_STR);
        $query->bindParam(':regulatoryCompliance', $regulatoryCompliance, PDO::PARAM_STR);
        $query->bindParam(':auditReports', $auditReports, PDO::PARAM_STR);

        $query->execute();
        
        if($query) {
            $msg = "Agro-Dealer registered successfully!";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    }
?>

<!DOCTYPE HTML>
<html>
<head>
<title>AgriEmpower | Register Agro-Dealer</title>
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
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Register Agro-Dealer</li>
            </ol>
            
            <div class="agile-grids">    
                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>Register Agro-Dealer</h2>
                        
                        <?php if($msg){?><div class="alert alert-success" role="alert"><?php echo htmlentities($msg); ?></div><?php } 
                        else if($error){?><div class="alert alert-danger" role="alert"><?php echo htmlentities($error); ?></div><?php }?>

                        <form method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td><label for="agroDealerID">Agro-Dealer ID</label><input type="text" name="agroDealerID" class="form-control" required></td>
                                    <td><label for="fullName">Full Name</label><input type="text" name="fullName" class="form-control" required></td>
                                    <td><label for="businessName">Business Name</label><input type="text" name="businessName" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="businessType">Business Type</label><input type="text" name="businessType" class="form-control" required></td>
                                    <td><label for="dateOfBirth">Date of Birth</label><input type="date" name="dateOfBirth" class="form-control" required></td>
                                    <td><label for="gender">Gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="nationalIDNumber">National ID Number</label><input type="text" name="nationalIDNumber" class="form-control" required></td>
                                    <td><label for="businessRegistrationNumber">Business Registration Number</label><input type="text" name="businessRegistrationNumber" class="form-control" required></td>
                                    <td><label for="taxIdentificationNumber">Tax Identification Number</label><input type="text" name="taxIdentificationNumber" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="phoneNumber">Phone Number</label><input type="text" name="phoneNumber" class="form-control" required></td>
                                    <td><label for="emailAddress">Email Address</label><input type="email" name="emailAddress" class="form-control" required></td>
                                    <td><label for="businessAddress">Business Address</label><input type="text" name="businessAddress" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="postalAddress">Postal Address</label><input type="text" name="postalAddress" class="form-control" required></td>
                                    <td><label for="bankName">Bank Name</label><input type="text" name="bankName" class="form-control" required></td>
                                    <td><label for="bankAccountNumber">Bank Account Number</label><input type="text" name="bankAccountNumber" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="bankBranch">Bank Branch</label><input type="text" name="bankBranch" class="form-control" required></td>
                                    <td><label for="bankAccountType">Bank Account Type</label>
                                        <select name="bankAccountType" class="form-control" required>
                                            <option value="Savings">Savings</option>
                                            <option value="Checking">Checking</option>
                                        </select>
                                    </td>
                                    <td><label for="accountHolderName">Account Holder's Name</label><input type="text" name="accountHolderName" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="iban">IBAN</label><input type="text" name="iban" class="form-control"></td>
                                    <td><label for="swiftCode">SWIFT/BIC Code</label><input type="text" name="swiftCode" class="form-control"></td>
                                    <td><label for="yearsInOperation">Years in Operation</label><input type="number" name="yearsInOperation" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td><label for="typeOfAgroProducts">Type of Agro-Products</label><input type="text" name="typeOfAgroProducts" class="form-control"></td>
                                    <td><label for="supplierRelationships">Supplier Relationships</label><input type="text" name="supplierRelationships" class="form-control"></td>
                                    <td><label for="distributionChannels">Distribution Channels</label><input type="text" name="distributionChannels" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="previousSubsidyClaims">Previous Subsidy Claims</label><input type="text" name="previousSubsidyClaims" class="form-control"></td>
                                    <td><label for="certificationDetails">Certification Details</label><input type="text" name="certificationDetails" class="form-control"></td>
                                    <td><label for="regulatoryCompliance">Regulatory Compliance</label><input type="text" name="regulatoryCompliance" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><label for="auditReports">Audit Reports</label><input type="text" name="auditReports" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><button type="submit" name="submit" class="btn btn-primary">Register Agro-Dealer</button></td>
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
<? include('');